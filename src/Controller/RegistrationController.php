<?php

namespace App\Controller;

use App\Entity\User;
use App\Helpers\WorkHelper;
use App\Repository\ElementRepository;
use App\Repository\MaterialRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Context\Context;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\Annotations;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use function Couchbase\passthruDecoder;

class RegistrationController extends AbstractFOSRestController
{
    /**
     * @Route("/registration", name="registration")
     * @Annotations\Get(path="/register", name="register")
     * @Annotations\View(serializerGroups={"public"})
     * @param Request $request
     * @param UserRepository $userRepository
     * @param MaterialRepository $materialRepository
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @param EntityManagerInterface $entityManager
     * @param UserPasswordHasherInterface $passwordHasher
     * @return \FOS\RestBundle\View\View
     */
    public function indexRegisterAction(
        Request $request,
        UserRepository $userRepository,
        MaterialRepository $materialRepository,
        UserPasswordEncoderInterface $passwordEncoder,
        EntityManagerInterface $entityManager,
        UserPasswordHasherInterface $passwordHasher
    )
    {
//        var_dump(1); die();

//        $username = $request->get('username');
        $email = $request->get('email');
        $password = $request->get('password');


//        $material = $materialRepository->find(1);

        $user = $userRepository->findOneBy([
            'email' => $email
        ]);

//        var_dump($user); die();
//        var_dump($username, $email, $token); die();

//        if (isset($user)) {
//            WorkHelper::dump($user); die();
//        } else {
//            var_dump('user not found'); die();
//        }

        if (!is_null($user)) {
            return $this->view([
               'message' => 'User already exists'
            ], Response::HTTP_CONFLICT);
        }

        $user = new User();

        $user->setEmail($email)
            ->setPassword($passwordHasher->hashPassword($user, $password))
            ->setRoles(['ROLE_USER']);

        $entityManager->persist($user);
        $entityManager->flush();

        return $this->view($user, Response::HTTP_CREATED);
//        return $this->view($user, Response::HTTP_CREATED)->setContext((new Context())->setGroups(['public'])); // Устанавливаем контекст (можно и в аннотации)

    }
}
