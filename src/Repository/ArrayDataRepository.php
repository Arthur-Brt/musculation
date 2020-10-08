<?php

namespace App\Repository;

use App\Entity\ArrayData;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ArrayData|null find($id, $lockMode = null, $lockVersion = null)
 * @method ArrayData|null findOneBy(array $criteria, array $orderBy = null)
 * @method ArrayData[]    findAll()
 * @method ArrayData[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArrayDataRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ArrayData::class);
    }

    // /**
    //  * @return ArrayData[] Returns an array of ArrayData objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ArrayData
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
