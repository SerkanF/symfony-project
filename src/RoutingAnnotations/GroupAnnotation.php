<?php

namespace App\RoutingAnnotations;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class GroupAnnotation
 * @package App\RoutingAnnotations
 * @Route(path="/group")
 */
class GroupAnnotation {

    public function __construct() {

    }

    /**
     * @Route(path="/")
     * @return Response
     */
    public function index() {
        return new Response("group index");
    }

    /**
     * @Route(path="/list")
     * @return Response
     */
    public function list() {
        return new Response("group list");
    }

}