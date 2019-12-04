<?php

namespace App\RoutingAnnotations;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SimpleAnnotation {

    public function __construct() {

    }

    /**
     * @Route(path="/simple")
     * @return Response
     */
    public function index() {
        return new Response('simple annotation');
    }

    /**
     * @Route(path="/simple/list")
     * @return Response
     */
    public function list() {
        return new Response('simple list');
    }

}