<?php

namespace App\EventsSubscriber\Depot;

use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\Depot;
use App\Entity\Vente;
use App\Repository\ProduitRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class NewDepot
{

    private $params;
    private $em;
    private $produitRepository;

    public function __construct(
        ParameterBagInterface $params,
        EntityManagerInterface $em,
        ProduitRepository $produitRepository
    ) {
        $this->params = $params;
        $this->em = $em;
        $this->produitRepository = $produitRepository;
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::VIEW => ['newDepot', EventPriorities::PRE_WRITE]
        ];
    }

    public function newDepot(ViewEvent $event)
    {

        $depot = $event->getControllerResult();
        $method = $event->getRequest()->getMethod();
        $data = json_decode($event->getRequest()->getContent(), true);
        if ($depot instanceof Depot && $method === "POST") {
            $depot->setStockInitial($depot->getQuantiteDeposee());
        }
    }
}
