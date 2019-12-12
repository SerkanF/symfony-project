<?php

namespace App\RestController;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class GroupAnnotation
 * @package App\RoutingAnnotations
 * @Route(path="/api")
 */
class UserRestController  {

    public function __construct() {

    }

    /**
     * @Route(path="/users", methods={"GET"})
     * @return JsonResponse
     */
    public function getUsers() : JsonResponse {

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

        return new JsonResponse($users);

    }

}