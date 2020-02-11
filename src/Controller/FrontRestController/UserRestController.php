<?php

namespace App\Controller\FrontRestController;

use App\Controller\AbfFrontAbstractController;
use App\Entity\User;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Class GroupAnnotation
 * @package App\RoutingAnnotations
 * @Route(path="/api/users")
 */
class UserRestController extends AbfFrontAbstractController {

    public function __construct() {

    }

    /**
     * @Route(path="/createAdminUser", methods={"GET"} )
     * @param UserPasswordEncoderInterface $encoder
     */
    public function createAdminUser(UserPasswordEncoderInterface $encoder) {

        $user = new User();
        $user->addRole("ROLE_ADMIN");
        $user->setEmail("admin@gmail.com");
        $user->setPassword($encoder->encodePassword($user, "admin"));
        $user->setUsername("admin");

        $repository = $this->getDoctrine()->getManager();
        $repository->persist($user);
        $repository->flush();

    }

    /**
     * @Route(path="/", methods={"GET"} )
     * @return JsonResponse
     */
    public function getUsers() : JsonResponse {

        $response = new JsonResponse();

        $response->headers->set('Content-Type', 'application/json');
        // Allow all websites
        $response->headers->set('Access-Control-Allow-Origin', '*');

        $users = array(
            [
                'id' => 1,
                'data' => 'Sow Brahim'
            ],
            [
                'id' => 2,
                'data' => 'Hanma Baki'
            ]
        );

        $response->setData($users);

        return $response;

    }

}