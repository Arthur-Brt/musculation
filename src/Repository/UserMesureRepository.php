<?php

namespace App\Repository;

use App\Entity\UserMesure;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UserMesure|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserMesure|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserMesure[]    findAll()
 * @method UserMesure[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserMesureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserMesure::class);
    }

    // /**
    //  * @return UserMesure[] Returns an array of UserMesure objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UserMesure
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
