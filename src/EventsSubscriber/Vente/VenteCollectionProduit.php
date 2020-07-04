<?php

namespace App\EventsSubscriber\Vente;

use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\Vente;
use App\Entity\VenteProduit;
use App\Repository\ClientRepository;
use App\Repository\ProduitRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class VenteCollectionProduit extends AbstractController implements EventSubscriberInterface
{

    private $params;
    private $em;
    private $produitRepository;
    private $clientRepository;

    public function __construct(
        ParameterBagInterface $params,
        EntityManagerInterface $em,
        ProduitRepository $produitRepository,
        ClientRepository $clientRepository
    ) {
        $this->params = $params;
        $this->em = $em;
        $this->produitRepository = $produitRepository;
        $this->clientRepository = $clientRepository;
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::VIEW => ['venteRegistration', EventPriorities::PRE_WRITE]
        ];
    }

    public function venteRegistration(ViewEvent $event)
    {
        $vente = $event->getControllerResult();
        $method = $event->getRequest()->getMethod();
        $data = json_decode($event->getRequest()->getContent(), true);
        if ($vente instanceof Vente && $method === "POST") {
            $vente->setDateVente($data['vente']['dateVente']);
            $client = $this->clientRepository->find($data['vente']['client']);
            $vente->setClient($client);
            $vente->setTotalVente($data['vente']['totalVente']);
            $vente->setTypePaiement($data['vente']['typePaiement']);
            $vente->setMontantVerse($data['vente']['montantVerse']);
            $vente->setMontantRendu($data['vente']['montantRendu']);

            $produits = $data['produits'];
            for ($i = 0; $i < count($produits); $i++) {
                $venteProduit = new VenteProduit();
                $venteProduit->setVente($vente);
                $produit = $this->produitRepository->find($produits[$i]['produit']['id']);
                $venteProduit->setProduit($produit);
                $produit->getDepots()[0]->setQuantiteVendue($produit->getDepots()[0]->getQuantiteVendue() + $produits[$i]['quantiteVendue']);
                $produit->getDepots()[0]->setStockFinal($produit->getDepots()[0]->getTotalStockApresDepot() - $produits[$i]['quantiteVendue']);
                $venteProduit->setQuantiteVendue($produits[$i]['quantiteVendue']);
                $venteProduit->setPrixVenteTotal($produits[$i]['prixVenteTotal']);
                $venteProduit->setPrixNetPayer($produits[$i]['prixNetPayer']);
                $venteProduit->setDateVente($data['vente']['dateVente']);
                $this->em->persist($venteProduit);
            }
            //die;
            $this->em->flush();
        }
    }
}
