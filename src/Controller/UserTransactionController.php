<?php

namespace App\Controller;

use App\Repository\UserTransactionRepository;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\Annotations;

class UserTransactionController extends AbstractFOSRestController
{
    /**
     * @Annotations\Get(path="/api/transactions", name="get_all_transactions")
     * @param UserTransactionRepository $userTransactionRepository
     * @return \App\Entity\UserTransaction[]
     */
    public function getTransactionsAction(UserTransactionRepository $userTransactionRepository)
    {
        return $userTransactionRepository->findAll();
    }


    /**
     * @Annotations\Get(path="/api/user-transactions/{id}", name="get_user_transactions")
     * @param UserTransactionRepository $userTransactionRepository
     * @return \App\Entity\UserTransaction[]
     */
    public function getUserTransactionsAction(int $id, UserTransactionRepository $userTransactionRepository)
    {
        return $userTransactionRepository->findBy(['user' => $id]);
    }


    /**
     * @Annotations\Get(path="/api/approve-transaction/{id}", name="approve_transaction")
     * @param int $id
     * @param UserTransactionRepository $userTransactionRepository
     * @param EntityManagerInterface $entityManager
     * @return void
     */
    public function approveTransactionAction(int $id, UserTransactionRepository $userTransactionRepository, EntityManagerInterface $entityManager)
    {
        $transaction = $userTransactionRepository->find($id);

        $transaction->setStatus('approved');
        $entityManager->persist($transaction);
        $entityManager->flush();
    }


    /**
     * @Annotations\Get(path="/api/decline-transaction/{id}", name="decline_transaction")
     * @param int $id
     * @param UserTransactionRepository $userTransactionRepository
     * @param EntityManagerInterface $entityManager
     * @return void
     */
    public function declineTransactionAction(int $id, UserTransactionRepository $userTransactionRepository, EntityManagerInterface $entityManager)
    {
        $transaction = $userTransactionRepository->find($id);

        $transaction->setStatus('declined');
        $entityManager->persist($transaction);
        $entityManager->flush();
    }

}
