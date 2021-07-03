<?php

namespace App\Repository;

use App\Entity\Typo3;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Typo3|null find($id, $lockMode = null, $lockVersion = null)
 * @method Typo3|null findOneBy(array $criteria, array $orderBy = null)
 * @method Typo3[]    findAll()
 * @method Typo3[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class Typo3Repository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Typo3::class);
    }

    // /**
    //  * @return Typo3[] Returns an array of Typo3 objects
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
    public function findOneBySomeField($value): ?Typo3
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
