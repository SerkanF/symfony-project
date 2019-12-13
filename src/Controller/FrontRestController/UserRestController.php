<?php

namespace App\Controller\FrontRestController;

use App\Controller\AbfFrontAbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class GroupAnnotation
 * @package App\RoutingAnnotations
 * @Route(path="/api")
 */
class UserRestController extends AbfFrontAbstractController {

    public function __construct() {

    }

    /**
     * @Route(path="/users", methods={"GET"} )
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