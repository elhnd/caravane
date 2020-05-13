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
        $fournisseur = $fournisseurRepository->findAll();
      
        return $this->json($fournisseur,200);
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
        $form = $this->createForm(FournisseurType::class, $fournisseur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
        }

        return $fournisseur;
    }

    /**
     * @Route("/{id}", name="fournisseur_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Fournisseur $fournisseur): Response
    {
        if ($this->isCsrfTokenValid('delete' . $fournisseur->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($fournisseur);
            $entityManager->flush();
        }

        return $this->redirectToRoute('fournisseur_index');
    }
}
