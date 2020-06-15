<?php

namespace App\Controller;

use App\Entity\Categorie;
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

    public function __construct(ValidatorInterface $validator, SerializerInterface $serializer, CategorieRepository $categorieRepository, ProduitRepository $produitRepository, FournisseurRepository $fournisseurRepository, EntityManagerInterface $em)

    {
        $this->categorieRepository = $categorieRepository;
        $this->produitRepository = $produitRepository;
        $this->fournisseurRepository = $fournisseurRepository;

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
                'ligne' => $ligne
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
                ->setCouleur($data->couleur);
            $this->em->persist($produit);
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
}
