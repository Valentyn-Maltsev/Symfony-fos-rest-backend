<?php

namespace App\Repository;

use App\Entity\UserTransaction;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query\Expr\Join;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UserTransaction|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserTransaction|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserTransaction[]    findAll()
 * @method UserTransaction[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserTransactionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserTransaction::class);
    }

    public function findTransactionByFilters(string $amount, string $status, string $type, string $email)
    {
        return $this->createQueryBuilder('user_transaction')
            ->andWhere('user_transaction.amount LIKE :amount')
            ->setParameter('amount', '%' . $amount . '%')
            ->andWhere('user_transaction.status LIKE :status')
            ->setParameter('status', '%' . $status . '%')
            ->andWhere('user_transaction.type LIKE :type')
            ->setParameter('type', '%' . $type . '%')
            ->join('App\Entity\User', 'u', Join::WITH, 'u.id = user_transaction.user')
            ->andWhere('u.email LIKE :email')
            ->setParameter('email', '%' . $email . '%')
            ->getQuery()
            ->execute();
    }

    // /**
    //  * @return UserTransaction[] Returns an array of UserTransaction objects
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
    public function findOneBySomeField($value): ?UserTransaction
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
