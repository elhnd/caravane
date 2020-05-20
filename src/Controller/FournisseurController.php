<?php

namespace App\Controller;

use App\Entity\Fournisseur;
use App\Form\FournisseurType;
use App\Repository\FournisseurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @Route("/fournisseur")
 */
class FournisseurController extends AbstractController
{
    private $message;
    private $status;
    private $groups;
    private $serializer;

    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
        $this->message = 'message'; 
        $this->status = 'status';
        $this->groups = 'groups';

    }


    /**
     * @Route("/", name="fournisseur_index", methods={"GET"})
     */
    public function index(FournisseurRepository $fournisseurRepository)
    {
        $ligne = 0;
        $dataFournisseurs = [];
        $rem = [];
        
        $fournisseur = $fournisseurRepository->findBy(array(), array('structure' => 'ASC'));
        foreach ($fournisseur as  $key) {
            
            $ligne++;
            $rem = array(
            'id'=>$key->getId(),
            'nomGerant'=>$key->getNomGerant(),
            'structure'=>$key->getStructure(),
            'tel'=>$key->getTel(),
            'email'=>$key->getEmail(),
            'adresse'=>$key->getAdresse(),
            'createAt'=>$key->getCreatedAt(),
            'updateAt'=>$key->getUpdatedAt(),
            'ligne'=>$ligne
           );
           array_push($dataFournisseurs, $rem);
        }

        return $this->json($dataFournisseurs,200);
    }

    /**
     * @Route("/new", name="fournisseur_new", methods={"GET","POST"})
     */
    public function new(Request $request, FournisseurRepository $repository)
    {

        $values = json_decode($request->getContent());

        $fournisseur = new Fournisseur();
        
        $repo = $repository->findByStructure($values->structure);

        $fournisseur->setStructure($values->structure);
        $fournisseur->setNomGerant($values->nomGerant);
        $fournisseur->setTel($values->tel);
        $fournisseur->setEmail($values->email);
        $fournisseur->setAdresse($values->adresse);

        if (!$repo) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($fournisseur);
            $entityManager->flush();

            $data = [
                $this->message => 'Fournisseur crée',
                $this->status => 201
            ];

            return  $this->json($data);
        }
        $existe = [
            $this->message => 'Le fournisseur '.$values->structure.' est deja enregistré',
            $this->status => 401
        ];

        return  $this->json($existe);
    }

    /**
     * @Route("/{id}", name="fournisseur_show", methods={"GET"})
     */
    public function show(Fournisseur $fournisseur)
    {
        
      
        return $this->json($fournisseur,200);
    }

    /**
     * @Route("/{id}/edit", name="fournisseur_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Fournisseur $fournisseur)
    {
        $data = json_decode($request->getContent());
        $fournisseur
                ->setStructure($data->structure)
                ->setNomGerant($data->nomGerant)
                ->setTel($data->tel)
                ->setEmail($data->email)
                ->setAdresse($data->adresse)
                ;
        $this->getDoctrine()->getManager()->flush();
        $data = [
            'message' => 'fournisseur modifié',
            'status' => 201
        ];
        return $this->json($data);
    }

    /**
     * @Route("/{id}", name="fournisseur_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Fournisseur $fournisseur): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($fournisseur);
        $entityManager->flush();
        $data = [
            'message' => 'fournisseur supprimé',
            'status' => 201
        ];
        return $this->json($data);
    }
}
