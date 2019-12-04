<?php

namespace App\Controller\Twig;

use Symfony\Component\HttpFoundation\Response;

class SecondPageController {

    private $twig;

    public function __construct($twigArgument) {
        $this->twig = $twigArgument;
    }

    public function index() {
        return new Response($this->twig->render("base.html.twig"));
    }

}