<?php

namespace App\Controller\Twig;

use Symfony\Component\HttpFoundation\Response;

class SecondPageController {

    private $twig;

    public function __construct($twigArgument) {
        $this->twig = $twigArgument;
    }

    public function index() {

        /*
            $html = $this->twig->load('base.html.twig')->render();
            $html .= $this->twig->load('templates-1.html.twig')->render();
            $html .= $this->twig->load('templates-2.html.twig')->render();
         */

        return new Response($this->twig->render("base.html.twig"));
    }

}