<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;


/**
 * Class HomeController
 * @package App\Controller
 *
 * A controller must return a Response Object
 *
 */

class HomeController {

    /**
     * @var Environment
     */
    private $twig;

    public function __construct(Environment $twig) {

        $this->twig = $twig;

    }

    public function index() {
        return new Response($this->twig->render('base.html.twig'));
    }

}
