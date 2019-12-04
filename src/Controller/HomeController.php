<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class HomeController {

    public function __construct() {

    }

    public function index() {
        return new Response('Index page');
    }

    public function home() {
        return new Response('Home page');
    }

}
