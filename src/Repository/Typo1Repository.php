<?php

namespace App\Repository;

use App\Entity\Typo1;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Typo1|null find($id, $lockMode = null, $lockVersion = null)
 * @method Typo1|null findOneBy(array $criteria, array $orderBy = null)
 * @method Typo1[]    findAll()
 * @method Typo1[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class Typo1Repository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Typo1::class);
    }

    // /**
    //  * @return Typo1[] Returns an array of Typo1 objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Typo1
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
