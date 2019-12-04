<?php

namespace App\Controller\Twig;

use Symfony\Component\HttpFoundation\Response;

class FirstPageController {

    private $twig;

    public function __construct($twig) {
        $this->twig = $twig;
    }

    public function index() {
        return new Response($this->twig->render("base.html.twig"));
    }

}