<?php

namespace App\Controller\Twig;

use Symfony\Component\HttpFoundation\Response;

class SecondPageController {

    private $twig;

    public function __construct($twigArgument) {
        $this->twig = $twigArgument;
    }

    public function index() {

        $html = $this->twig->load('content/template-1.html.twig')->render();
        $html .= $this->twig->load('content/template-2.html.twig')->render();
        $html .= $this->twig->load('content/template-1.html.twig')->render();
        $html .= $this->twig->load('content/template-2.html.twig')->render();

        return new Response($html);
    }

}