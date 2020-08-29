<?php

namespace App\Controller\FrontEndController;

use App\Controller\AbfFrontAbstractController;
use App\Entity\User;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Util\Util;

/**
 * Class GroupAnnotation
 * @package App\RoutingAnnotations
 * @Route(path="")
 */
class PatchNoteController extends AbfFrontAbstractController {

    /**
     * @Route(path="/patchs")
     * @return Response
     */
    public function patches() {
        return $this->renderCustomView('front-end/eden/pages/all-patches.html.twig');
    }

    /**
     * @Route(path="/patchnote-0001")
     * @return Response
     */
    public function patchenote0001() {
        return $this->renderCustomView('front-end/eden/pages/patches/patch-0001.html.twig');
    }

}