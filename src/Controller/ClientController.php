<?php

namespace App\Controller;

use App\Entity\Client;
use App\Form\ClientType;
use App\Repository\ClientRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/client")
 */
class ClientController extends AbstractController
{
    /**
     * @Route("/", name="client_index", methods={"GET"})
     */
    public function index(ClientRepository $clientRepository)
    {
        $ligne = 0;
        $dataClients = [];
        $rem = [];

        $client = $clientRepository->findBy(array(), array('nomComplet' => 'ASC'));
        foreach ($client as  $key) {

            $ligne++;
            $rem = array(
                'id' => $key->getId(),
                'nomComplet' => $key->getNomComplet(),
                'telephone' => $key->getTelephone(),
                'adresse' => $key->getAdresse(),
                'createAt' => $key->getCreatedAt(),
                'updateAt' => $key->getUpdatedAt(),
                'ligne' => $ligne
            );
            array_push($dataClients, $rem);
        }

        return $this->json($dataClients, 200);
    }

    /**
     * @Route("/new", name="client_new", methods={"GET","POST"})
     */
    public function new(Request $request)
    {
        $values = json_decode($request->getContent());

        $client = new Client();

        $client->setNomComplet($values->nomComplet);
        $client->setTelephone($values->telephone);
        $client->setAdresse($values->adresse);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($client);
        $entityManager->flush();

        $data = [
            'message' => 'client crée',
            'status' => 201
        ];
        return $this->json($data);
    }

    /**
     * @Route("/{id}", name="client_show", methods={"GET"})
     */
    public function show(Client $client)
    {
        return $this->json($client, 200);
    }

    /**
     * @Route("/{id}/edit", name="client_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Client $client)
    {
        $data = json_decode($request->getContent());
        $client
            ->setNomComplet($data->nomComplet)
            ->setTelephone($data->telephone)
            ->setAdresse($data->adresse);
        $this->getDoctrine()->getManager()->flush();
        $data = [
            'message' => 'client modifié',
            'status' => 201
        ];
        return $this->json($data);
    }

    /**
     * @Route("/{id}", name="client_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Client $client)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($client);
        $entityManager->flush();
        $data = [
            'message' => 'client supprimé',
            'status' => 201
        ];
        return $this->json($data);
        // if ($this->isCsrfTokenValid('delete' . $client->getId(), $request->request->get('_token'))) {
        // // }
        // return $this->redirectToRoute('client_index');
    }
}
