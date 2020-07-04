<?php

namespace App\Controller;

use App\Entity\Fournisseur;
use App\Repository\FournisseurRepository;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AccessFournisseur extends AbstractController
{

    private $fournisseurRepository;
    private $em;
    private $mailer;

    public function __construct(FournisseurRepository $fournisseurRepository, EntityManagerInterface $em,\Swift_Mailer $mailer)
    {
        $this->fournisseurRepository = $fournisseurRepository;
        $this->em = $em;
        $this->mailer = $mailer;
    }

    public function __invoke($id)
    {
        $date = new \DateTime();
        $fournisseur = $this->fournisseurRepository->find($id);
        $fournisseur->setTokenAccess(\bin2hex(\random_bytes(32)));
        $fournisseur->setTokenExpireAt($date->modify('+1 day'));
        $this->em->flush();
            $message = (new \Swift_Message('test'))
                ->setSubject('Ajout produit sur CARAVANE')
                ->setFrom('noreplay20@gmail.com')
                ->setTo($fournisseur->getEmail())
                ->setBody(
                    $this->renderView(
                        'fournisseur/produit.html.twig',
                        [
                            'structure' => $fournisseur->getStructure(),
                            'nom_gerant' => $fournisseur->getNomGerant(),
                            'url' => 'https://127.0.0.1:8000/fournisseur/add/produit/'.$fournisseur->getTokenAccess(),
                        ]
                    ),
                    'text/html'
                );

            $this->mailer->send($message);
        return;
    }
}
