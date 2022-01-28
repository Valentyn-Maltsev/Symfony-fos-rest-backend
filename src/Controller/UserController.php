<?php

namespace App\Controller;

use App\Repository\UserProfileRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations;
use Symfony\Component\HttpFoundation\JsonResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Request;

class UserController extends AbstractFOSRestController
{
    /**
     * @Annotations\Get(path="/api/users", name="get_all_users")
     *
     * @param UserRepository $userRepository
     * @IsGranted("ROLE_USER")
     */
    public function getUsersAction(UserRepository $userRepository)
    {
        return $userRepository->findAll();
    }

    /**
     * @Annotations\Get(path="/api/user-profile/{id}", name="get_user_profile")
     *
     * @param int $id
     * @param UserProfileRepository $userProfileRepository
     */
    public function getUserProfileAction(int $id, UserProfileRepository $userProfileRepository)
    {
        return $userProfileRepository->findOneBy(['user' => $id]);
    }


    /**
     * @Annotations\Post(path="/api/user-profile/update/{id}", name="update_user_profile")
     *
     * @param int $id
     * @param UserProfileRepository $userProfileRepository
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return mixed
     */
    public function postUserProfileAction(
        int $id,
        UserProfileRepository $userProfileRepository,
        Request $request,
        EntityManagerInterface $entityManager
    )
    {
//        $firstName = $request->get('first_name');
//        $lastName = $request->get('last_name');

        $userProfile = $userProfileRepository->findOneBy(['user' => $id]);

        $userProfile
            ->setFirstName($request->get('first_name'))
            ->setLastName($request->get('last_name'))
        ;

        $entityManager->persist($userProfile);
        $entityManager->flush();

//        return [
//            $firstName,
//            $lastName
//        ];
    }


    /**
     * @Annotations\Post(path="/ping", name="post_action")
     */
    public function postAction()
    {
        return new JsonResponse(
            'pong post'
        );
    }

    /**
     * @Annotations\Patch(path="/ping", name="potch_action")
     */
    public function patchAction()
    {
        return new JsonResponse(
            'pong patch'
        );
    }

    /**
     * @Annotations\Delete(path="/ping", name="delete_action")
     */
    public function deleteAction()
    {
        return new JsonResponse(
            'pong delete'
        );
    }





//    public function getUsersAction()
//    {
//        var_dump(1); die();
////        $data = ...; // get data, in this case list of users.
//        $view = $this->view($data, 200);
//
//        return $this->handleView($view);
//    }

    public function redirectAction()
    {
        $view = $this->redirectView($this->generateUrl('some_route'), 301);
        // or
        $view = $this->routeRedirectView('some_route', array(), 301);

        return $this->handleView($view);
    }
}
