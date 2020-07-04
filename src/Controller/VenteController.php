<?php

namespace App\Controller;

use App\Entity\Vente;
use App\Entity\VenteProduit;
use App\Repository\ClientRepository;
use App\Repository\ProduitRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
/**
 * @Route("/api")
 */
class VenteController extends AbstractController
{
      /**
     * @var EntityManagerInterface
     */
    private $em;

    private $produitRepository;
    private $clientRepository;
    private $message;
    private $status;

    public function __construct(ProduitRepository $produitRepository, ClientRepository $clientRepository, EntityManagerInterface $em)

    {
        $this->produitRepository = $produitRepository;
        $this->clientRepository = $clientRepository;
        $this->message= 'message';
        $this->status= 'status';
        $this->em = $em;
    }
      /**
     * @Route("/vente/mass", name="mass_vente", methods={"POST"})
     */
    public function mass(Request $request)
    {
        $values = json_decode($request->getContent());

        $tab = $values->vente->results;

        foreach ($tab as $key) {

            $produit = $this->produitRepository->findOneByDesignation($key->produit);
            $client = $this->clientRepository->findOneByTelephone($key->client);

            if (!$produit) {
                $data = [
                    $this->message => 'le produit avec la designation suivante ' . $key->produit . ' n\'existe pas',
                    $this->status => 401
                ];
                return  $this->json($data);
            }
         
            if (!$client) {
                $data = [
                    $this->message => 'le client avec la numero suivant ' . $key->client . ' n\'existe pas',
                    $this->status => 401
                ];
                return  $this->json($data);
            }
            $vente = new Vente;
            $vente->setDateVente($key->dateVente);
            $vente->setTypePaiement($key->typePaiement);
            $vente->setTotalVente($key->prixVente*$key->quantite);
            $vente->setMontantRendu($key->montantRendu);
            $vente->setMontantVerse($key->quantite);
            $vente->setClient($client);
            $venteProduit = new VenteProduit();
            $venteProduit->setVente($vente);
            $venteProduit->setProduit($produit);
            $venteProduit->setQuantiteVendue($key->quantite);
            $venteProduit->setPrixVenteTotal($key->prixVente*$key->quantite);
            $venteProduit->setPrixNetPayer($key->montantRendu);
            $venteProduit->setDateVente($key->dateVente);

            $this->em->persist($vente);
            $this->em->persist($venteProduit);

        }
        $this->em->flush();

        $data = [
            $this->message => 'Les ventes sont créés',
            $this->status => 201
        ];
        return  $this->json($data);
    }
}
