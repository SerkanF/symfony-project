<?php

namespace App\Controller\Autowire;

use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

/**
 * This "Service" is automatically imported by line :
 *
    App\Controller\:
    resource: '../src/Controller'
    tags: ['controller.service_arguments']
 *
 * in services.yaml
 *
 * Class FirstAutowireController
 * @package App\Controller\Autowire
 */
class FirstAutowireController {

    /**
     * @var Environment
     */
    private $twig;

    /**
     * FirstAutowireController constructor.
     * @param Environment $twig
     *
     * Symfony will inject automatically Twig Environment because Twig is an autowire service
     *
     */
    public function __construct(Environment $twig) {
        $this->twig = $twig;
    }

    public function index() {
        return new Response($this->twig->render('autowire.html.twig'));
    }


}