<?php

namespace App\Repository;

use App\Entity\TechSet;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TechSet|null find($id, $lockMode = null, $lockVersion = null)
 * @method TechSet|null findOneBy(array $criteria, array $orderBy = null)
 * @method TechSet[]    findAll()
 * @method TechSet[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TechSetRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TechSet::class);
    }

    // /**
    //  * @return TechSet[] Returns an array of TechSet objects
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
    public function findOneBySomeField($value): ?TechSet
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
