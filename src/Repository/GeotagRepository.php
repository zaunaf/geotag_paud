<?php

namespace App\Repository;

use App\Entity\Geotag;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Geotag|null find($id, $lockMode = null, $lockVersion = null)
 * @method Geotag|null findOneBy(array $criteria, array $orderBy = null)
 * @method Geotag[]    findAll()
 * @method Geotag[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GeotagRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Geotag::class);
    }

    // /**
    //  * @return Geotag[] Returns an array of Geotag objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Geotag
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
