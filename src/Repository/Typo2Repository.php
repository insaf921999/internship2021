<?php

namespace App\Repository;

use App\Entity\Typo2;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Typo2|null find($id, $lockMode = null, $lockVersion = null)
 * @method Typo2|null findOneBy(array $criteria, array $orderBy = null)
 * @method Typo2[]    findAll()
 * @method Typo2[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class Typo2Repository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Typo2::class);
    }

    // /**
    //  * @return Typo2[] Returns an array of Typo2 objects
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
    public function findOneBySomeField($value): ?Typo2
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
