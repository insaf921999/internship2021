<?php

namespace App\Repository;

use App\Entity\Macroprocessus;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Macroprocessus|null find($id, $lockMode = null, $lockVersion = null)
 * @method Macroprocessus|null findOneBy(array $criteria, array $orderBy = null)
 * @method Macroprocessus[]    findAll()
 * @method Macroprocessus[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MacroprocessusRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Macroprocessus::class);
    }

    // /**
    //  * @return Macroprocessus[] Returns an array of Macroprocessus objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Macroprocessus
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
