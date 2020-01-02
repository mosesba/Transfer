<?php

namespace App\Repository;

use App\Entity\IsActive;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method IsActive|null find($id, $lockMode = null, $lockVersion = null)
 * @method IsActive|null findOneBy(array $criteria, array $orderBy = null)
 * @method IsActive[]    findAll()
 * @method IsActive[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IsActiveRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, IsActive::class);
    }

    // /**
    //  * @return IsActive[] Returns an array of IsActive objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?IsActive
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
