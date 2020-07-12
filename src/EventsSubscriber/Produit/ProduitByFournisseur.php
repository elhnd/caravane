<?php

namespace App\EventsSubscriber\Produit;

use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\Depot;
use App\Entity\Produit;
use App\Repository\CategorieRepository;
use App\Repository\FournisseurRepository;
use App\Repository\ProduitRepository;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class ProduitByFournisseur extends AbstractController implements EventSubscriberInterface
{

    private $em;
    private $produitRepository;
    private $fournisseurRepository;
    private $categorieReopsitory;

    public function __construct(
        EntityManagerInterface $em,
        ProduitRepository $produitRepository,
        FournisseurRepository $fournisseurRepository,
        CategorieRepository $categorieReopsitory
    ) {
        $this->em = $em;
        $this->produitRepository = $produitRepository;
        $this->fournisseurRepository = $fournisseurRepository;
        $this->categorieReopsitory = $categorieReopsitory;
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::VIEW => ['produitByFournisseur', EventPriorities::PRE_VALIDATE]
        ];
    }

    public function produitByFournisseur(ViewEvent $event)
    {
        $produit = $event->getControllerResult();
        $method = $event->getRequest()->getMethod();
        $data = json_decode($event->getRequest()->getContent(), true);
        if ($produit instanceof Produit && $method === "POST") {
            $fournisseur = $this->fournisseurRepository->findOneByTokenAccess($data['token_access']);
            if ($fournisseur && $fournisseur->getTokenExpireAt()) {
                $exp = strtotime($fournisseur->getTokenExpireAt()->format('Y-m-d H:i:s'));
                $today = strtotime(date("Y-m-d H:i:s"));
                if ($today > $exp) {
                    return new Exception("Vous n'avez pas d'autorisation", 401);
                } else {

                    $produits = $data['produits'];

                    for ($i = 0; $i < count($produits); $i++) {
                        $produit = new Produit();
                        $depot = new Depot();
                        $produit->setDesignation($produits[$i]['designation']);
                        $categorie = $this->categorieReopsitory->findOneById($produits[$i]['categorie']);
                        $produit->setFournisseur($fournisseur);
                        $produit->setCategorie($categorie);
                        $produit->setPrixVente($produits[$i]['prixVente']);
                        $produit->setQuantite($produits[$i]['quantite']);
                        $produit->setCouleur($produits[$i]['couleur']);
                        $produit->setTaille($produits[$i]['taille']);
                        $produit->setAge($produits[$i]['age']);
                        $produit->setPointure($produits[$i]['pointure']);
                        $depot->setProduit($produit);
                        $depot->setQuantiteDeposee(0);
                        $depot->setQuantiteVendue(0);
                        $depot->setStockFinal($produits[$i]['quantite']);
                        $depot->setStockInitial(0);
                        $depot->setTotalStockApresDepot(0);

                        $this->em->persist($produit);
                        $this->em->persist($depot);
                    }
                    $this->em->flush();
                }
                die;
            }
        }
    }
}
