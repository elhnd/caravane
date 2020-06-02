<?php

namespace App\Repository;

use App\Entity\Client;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Client|null find($id, $lockMode = null, $lockVersion = null)
 * @method Client|null findOneBy(array $criteria, array $orderBy = null)
 * @method Client[]    findAll()
 * @method Client[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClientRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Client::class);
    }

    // /**
    //  * @return Client[] Returns an array of Client objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    public function getClientsInDate($start,$end){

        return $this->createQueryBuilder('c')
            ->andWhere("c.createdAt BETWEEN :start AND :end")
            ->setParameter("start", new \DateTime("$start 00:00:00"))
            ->setParameter("end", new \DateTime("$end 23:59:59"))
            ->getQuery()
            ->getResult()
        ;
    }


    /*
    
    
        if ($resourceClass === Client::class) {
            $request = new Request();

           // dd($request->getContent());
            $request->getContent() ? $data = json_decode($request->getContent(), true) : $data = [];

            if (key_exists("dateStart", $data) && key_exists("dateEnd", $data)) {
                $start = $data["dateStart"];
                $end = $data["dateEnd"];
                $rootAlias = $queryBuilder->getRootAliases()[0];

                $queryBuilder->andWhere("$rootAlias.createdAt BETWEEN :start AND :end")
                    ->setParameter("start", new \DateTime("$start 00:00:00"))
                    ->setParameter("end", new \DateTime("$end 23:59:59"));
            }
        }
    
    */

    /*
    public function findOneBySomeField($value): ?Client
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
