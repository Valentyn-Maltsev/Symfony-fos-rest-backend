<?php

namespace App\Controller;

use App\Entity\Material;
use App\Entity\OperationType;
use App\Form\User\MaterialType;
use App\Helpers\WorkHelper;
use App\Repository\ElementRepository;
use App\Repository\MaterialRepository;
use App\Repository\PartRepository;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Context\Context;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations;
use JMS\Serializer\Exclusion\GroupsExclusionStrategy;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\Serializer;
use Symfony\Component\HttpFoundation\JsonResponse;
use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Component\HttpFoundation\Request;
use function Webmozart\Assert\Tests\StaticAnalysis\false;

class UserController extends AbstractFOSRestController
{
    /**
     * @Annotations\Get(path="/ping", name="get_action")
     */
    public function getAction()
    {
        return new JsonResponse(
            'pong get'
        );
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





    public function getUsersAction()
    {
        var_dump(1); die();
//        $data = ...; // get data, in this case list of users.
        $view = $this->view($data, 200);

        return $this->handleView($view);
    }

    public function redirectAction()
    {
        $view = $this->redirectView($this->generateUrl('some_route'), 301);
        // or
        $view = $this->routeRedirectView('some_route', array(), 301);

        return $this->handleView($view);
    }
}
