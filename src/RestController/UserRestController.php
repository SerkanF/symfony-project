<?php

namespace App\RestController;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class UserRestController {

    public function __construct() {

    }

    /**
     * @Route(path="/users", methods={"GET"})
     * @return JsonResponse
     */
    public function getClients() : JsonResponse {

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