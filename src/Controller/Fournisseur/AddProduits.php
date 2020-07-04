<?php

namespace App\Controller\Fournisseur;

use Symfony\Component\HttpFoundation\Request;

class AddProduits
{
    public function __construct()
    {
        
    }


    // public function produitByFournisseur(ViewEvent $event)
    // {
    //     $request = new Request();
    //     $produit = $event->getControllerResult();
    //     $method = $event->getRequest()->getMethod();
    //     $data = json_decode($event->getRequest()->getContent(), true);
    //     if ($produit instanceof Produit && $method === "POST") {
    //         $fournisseur = $this->fournisseurRepository->findOneByTokenAccess($data['token_access']);
    //         if ($fournisseur && $fournisseur->getTokenExpireAt()) {
    //             $exp = strtotime($fournisseur->getTokenExpireAt()->format('Y-m-d H:i:s'));
    //             $today = strtotime(date("Y-m-d H:i:s"));
    //             if ($today > $exp) {
    //                 return new Exception("Vous n'avez pas d'autorisation", 401);
    //             } else {

    //                 $produits = $data['produits'];

    //                 for ($i = 0; $i < count($produits); $i++) {
    //                     $produit->setDesignation($produits[$i]['designation']);
    //                     $categorie = $this->categorieReopsitory->findOneById($produits[$i]['categorie']);
    //                     $produit->setFournisseur($fournisseur);
    //                     $produit->setCategorie($categorie);
    //                     $produit->setPrixVente($produits[$i]['prixVente']);
    //                     $produit->setQuantite($produits[$i]['quantite']);
    //                     $produit->setCouleur($produits[$i]['couleur']);
    //                     $produit->setTaille($produits[$i]['taille']);
    //                     $produit->setAge($produits[$i]['age']);
    //                     $produit->setPointure($produits[$i]['pointure']);
    //                     $this->em->persist($produit);
    //                 }
    //             }
    //         }
    //     }
    // }
}
