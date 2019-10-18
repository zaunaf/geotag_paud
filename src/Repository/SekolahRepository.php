<?php

namespace App\Repository;

use App\Entity\Sekolah;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Sekolah|null find($id, $lockMode = null, $lockVersion = null)
 * @method Sekolah|null findOneBy(array $criteria, array $orderBy = null)
 * @method Sekolah[]    findAll()
 * @method Sekolah[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SekolahRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Sekolah::class);
    }

    // /**
    //  * @return Sekolah[] Returns an array of Sekolah objects
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
    public function findOneBySomeField($value): ?Sekolah
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
