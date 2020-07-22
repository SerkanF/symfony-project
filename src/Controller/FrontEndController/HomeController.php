<?php

namespace App\Controller\FrontEndController;

use App\Controller\AbfFrontAbstractController;
use App\Entity\User;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class HomeController extends AbfFrontAbstractController {

    /**
     * @Route(path="/")
     * @return Response
     */
    public function index() {
        return $this->renderCustomView('front-end/base.html.twig');
    }

    /**
     * @Route(path="/resume")
     * @return Response
     */
    public function resume() {
        return $this->renderCustomView('front-end/resume.html.twig');
    }

    /**
     * @Route(path="/home", name="home")
     * @return 
     */
    public function homeEden() {
        return $this->renderCustomView('front-end/eden/base.html.twig');
    }

}