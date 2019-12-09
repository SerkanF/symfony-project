<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class HomeController {

    /**
     * @var Environment
     */
    private $twig;

    public function __construct(Environment $twig) {
        $this->twig = $twig;
    }

    public function index() {
        return new Response($this->twig->render('content/template-1.html.twig'));
    }

    public function home() {
        return new Response('Home page');
    }

}
