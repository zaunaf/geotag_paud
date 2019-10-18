<?php

namespace App\Repository;

use App\Entity\JenisFoto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method JenisFoto|null find($id, $lockMode = null, $lockVersion = null)
 * @method JenisFoto|null findOneBy(array $criteria, array $orderBy = null)
 * @method JenisFoto[]    findAll()
 * @method JenisFoto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JenisFotoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, JenisFoto::class);
    }

    // /**
    //  * @return JenisFoto[] Returns an array of JenisFoto objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('j.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?JenisFoto
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
