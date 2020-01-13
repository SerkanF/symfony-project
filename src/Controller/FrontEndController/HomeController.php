<?php

namespace App\Controller\FrontEndController;

use App\Controller\AbfFrontAbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbfFrontAbstractController {

    /**
     * @Route(path="/")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index() {
        return $this->render('front-end/base.html.twig');
    }

    /**
     * @Route(path="/resume")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function resume() {
        return $this->render('front-end/resume.html.twig');
    }

}