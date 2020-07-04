<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Entity\Depot;
use App\Entity\Produit;
use App\Repository\ProduitRepository;
use App\Repository\CategorieRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\FournisseurRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/api")
 */

class ProduitController extends AbstractController
{
    /**
     * @var EntityManagerInterface
     */
    private $em;
    private $categorieRepository;
    private $serializer;
    private $validator;
    private $produitRepository;
    private $fournisseurRepository;
    private $message;
    private $status;

    public function __construct(ValidatorInterface $validator, SerializerInterface $serializer, CategorieRepository $categorieRepository, ProduitRepository $produitRepository, FournisseurRepository $fournisseurRepository, EntityManagerInterface $em)

    {
        $this->categorieRepository = $categorieRepository;
        $this->produitRepository = $produitRepository;
        $this->fournisseurRepository = $fournisseurRepository;
        $this->message= 'message';
        $this->status= 'status';
        $this->serializer = $serializer;
        $this->em = $em;
        $this->validator = $validator;
    }


    /**
     * @Route("/produit", name="produit", methods={"GET"})
     */
    public function index()
    {
        $ligne = 0;
        $dataProduits = [];
        $rem = [];

        $produit = $this->produitRepository->findBy([], ['designation' => 'ASC']);
        foreach ($produit as  $key) {

            $ligne++;
            $rem = array(
                'id' => $key->getId(),
                'designation' => $key->getDesignation(),
                'taille' => $key->getTaille(),
                'age' => $key->getAge(),
                'pointure' => $key->getPointure(),
                'couleur' => $key->getCouleur(),
                'structure' => $key->getFournisseur()->getStructure(),
                'libelle' => $key->getCategorie()->getLibelle(),
                'prixVente' => $key->getPrixVente(),
                'createAt' => $key->getCreatedAt(),
                'updateAt' => $key->getUpdatedAt(),
                'ligne' => $ligne,
                'quantite' => $key->getQuantite(),
            );
            array_push($dataProduits, $rem);
        }

        return $this->json($dataProduits, 200);
    }

    /**
     * @Route("/newProduit", name="produity_new", methods={"POST"})
     */
    public function newProduits(Request $request)
    {

        $produit = new Produit;
        $data = json_decode($request->getContent());
        if (!$data) {
            $data = $request->request->all();
        }
        $category = $this->categorieRepository->findOneBy(['libelle' => $data->libelle]);
        $fournisseur = $this->fournisseurRepository->findOneBy(['structure' => $data->structure]);
        if ($category && $fournisseur) {
            # code...
            $produit
                ->setCategorie($category)
                ->setFournisseur($fournisseur)
                ->setDesignation($data->designation)
                ->setPrixVente($data->prixVente)
                ->setTaille($data->taille)
                ->setAge($data->age)
                ->setPointure($data->pointure)
                ->setCouleur($data->couleur)
                ->setQuantite($data->quantite);

            $depot = (new Depot())
                ->setProduit($produit)
                ->setStockInitial($produit->getQuantite())
                ->setQuantiteDeposee($produit->getQuantite())
                ->setQuantiteVendue(0)
                ->setTotalStockApresDepot($produit->getQuantite())
                ->setStockFinal($produit->getQuantite());

            $this->em->persist($produit);
            $this->em->persist($depot);
        } else {
            # code...
            $data = [

                'status' => 404,
                'message' => 'Fournisseur ou Catégorie non trouvé'
            ];
            return new JsonResponse($data, 201);
        }
        $errors = $this->validator->validate($produit);
        if (count($errors)) {
            $errors = $this->serializer->serialize($errors, 'json');
            return new Response($errors, 500, [
                'Content-Type' => 'application/json'
            ]);
        } else {
            # code...
            $this->em->flush();
            $data = [

                'status' => 201,
                'message' => 'Produit Créée'
            ];
            return new JsonResponse($data, 201);
        }
    }
    /**
     * @Route("/modifierproduit/{id}", name="produit_edit", methods={"GET","POST"})
     */
    public function modifierproduit(Request $request, Produit $produit)
    {
        $data = json_decode($request->getContent());

        $category = $this->categorieRepository->findOneBy(['libelle' => $data->libelle]);
        $fournisseur = $this->fournisseurRepository->findOneBy(['structure' => $data->structure]);
        if ($category && $fournisseur) {
            # code...
            $produit
                ->setCategorie($category)
                ->setFournisseur($fournisseur)
                ->setDesignation($data->designation)
                ->setPrixVente($data->prixVente)
                ->setTaille($data->taille)
                ->setAge($data->age)
                ->setPointure($data->pointure)
                ->setCouleur($data->couleur);
        } else {
            # code...
            $data = [

                'status' => 404,
                'message' => 'Fournisseur ou Catégorie non trouvé'
            ];
            return new JsonResponse($data, 201);
        }
        $errors = $this->validator->validate($produit);
        if (count($errors)) {
            $errors = $this->serializer->serialize($errors, 'json');
            return new Response($errors, 500, [
                'Content-Type' => 'application/json'
            ]);
        } else {
            # code...
            $this->em->flush();
            $data = [

                'status' => 201,
                'message' => 'Produit Modifié'
            ];
            return new JsonResponse($data, 201);
        }
    }

    /**
     * @Route("/supprimmerCategory/{id}", name="cat_delete", methods={"DELETE"})
     */
    public function delete(Produit $produit)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($produit);
        $entityManager->flush();
        $data = [
            'message' => 'Produit supprimé',
            'status' => 201
        ];
        return $this->json($data);
        // if ($this->isCsrfTokenValid('delete' . $client->getId(), $request->request->get('_token'))) {
        // // }
        // return $this->redirectToRoute('client_index');
    }
    /**
     * @Route("/produit/mass", name="mass_produit", methods={"POST"})
     */
    public function mass(Request $request)
    {
        $values = json_decode($request->getContent());

        $tab = $values->produit->results;

        foreach ($tab as $key) {

            $designation = $this->produitRepository->findOneByDesignation($key->designation);
            $four = $this->fournisseurRepository->findOneByStructure($key->fournisseur);
            $category = $this->categorieRepository->findOneByLibelle($key->categorie);

            if ($designation) {
                $data = [
                    $this->message => 'le produit avec la designation suivante ' . $key->designation . ' existe déjà',
                    $this->status => 401
                ];
                return  $this->json($data);
            }
            if (!$four) {
                $data = [
                    $this->message => 'le fournisseur avec la structure suivante ' . $key->fournisseur . ' n\'existe pas',
                    $this->status => 401
                ];
                return  $this->json($data);
            }
            if (!$category) {
                $data = [
                    $this->message => 'le categorie avec la nom suivant ' . $key->categorie . ' n\'existe pas',
                    $this->status => 401
                ];
                return  $this->json($data);
            }
            $produit = new Produit;
            $produit->setDesignation($key->designation);
            $produit->setTaille($key->taille);
            $produit->setAge($key->age);
            $produit->setPointure($key->pointure);
            $produit->setCouleur($key->couleur);
            $produit->setQuantite($key->quantite);
            $produit->setPrixVente($key->prixVente);
            $produit->setCategorie($category);
            $produit->setFournisseur($four);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($produit);
        }
        $entityManager->flush();

        $data = [
            $this->message => 'Les produits sont créés',
            $this->status => 201
        ];
        return  $this->json($data);
    }
}
