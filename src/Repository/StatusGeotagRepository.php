<?php

namespace App\Repository;

use App\Entity\StatusGeotag;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method StatusGeotag|null find($id, $lockMode = null, $lockVersion = null)
 * @method StatusGeotag|null findOneBy(array $criteria, array $orderBy = null)
 * @method StatusGeotag[]    findAll()
 * @method StatusGeotag[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StatusGeotagRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StatusGeotag::class);
    }

    // /**
    //  * @return StatusGeotag[] Returns an array of StatusGeotag objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?StatusGeotag
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
