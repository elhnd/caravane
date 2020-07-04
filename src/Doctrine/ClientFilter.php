<?php

namespace App\Doctrine;

use ApiPlatform\Core\Bridge\Doctrine\Orm\Extension\QueryCollectionExtensionInterface;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Extension\QueryItemExtensionInterface;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Util\QueryNameGeneratorInterface;
use App\Entity\Client;
use App\Entity\User;
use Doctrine\ORM\QueryBuilder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;

class ClientFilter /*implements QueryCollectionExtensionInterface, QueryItemExtensionInterface*/
{

    // private $security;

    // public function __construct(Security $security)
    // {
    //     $this->security = $security;
    // }

    // public function applyToCollection(QueryBuilder $queryBuilder, QueryNameGeneratorInterface $queryNameGenerator, string $resourceClass, ?string $operationName = null)
    // {
    //     if ($resourceClass === Client::class) {
    //         $request = new Request();

    //        // dd($request->getContent());
    //         $request->getContent() ? $data = json_decode($request->getContent(), true) : $data = [];

    //         if (key_exists("dateStart", $data) && key_exists("dateEnd", $data)) {
    //             $start = $data["dateStart"];
    //             $end = $data["dateEnd"];
    //             $rootAlias = $queryBuilder->getRootAliases()[0];

    //             $queryBuilder->andWhere("$rootAlias.createdAt BETWEEN :start AND :end")
    //                 ->setParameter("start", new \DateTime("$start 00:00:00"))
    //                 ->setParameter("end", new \DateTime("$end 23:59:59"));
    //         }
    //     }
    // }

    // public function applyToItem(QueryBuilder $queryBuilder, QueryNameGeneratorInterface $queryNameGenerator, string $resourceClass, array $identifiers, ?string $operationName = null, array $context = [])
    // {
        
    // }
}
