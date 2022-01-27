<?php

namespace App\Controller;

use App\Repository\UserTransactionRepository;
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

}
