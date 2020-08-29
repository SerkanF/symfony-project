<?php

namespace App\Controller\FrontEndController;

use App\Controller\AbfFrontAbstractController;
use App\Entity\User;
use App\Util\PackUtil;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Util\Util;

/**
 * Class GroupAnnotation
 * @package App\RoutingAnnotations
 * @Route(path="/packs")
 */
class PackController extends AbfFrontAbstractController {

    /**
     * @Route(path="/")
     * @return Response
     */
    public function index() {

        $data = PackUtil::getAllContentPack($this->getDoctrine(), null);

        $this->data['packs'] = $data;

        return $this->renderCustomView('front-end/eden/pages/all.packs.html.twig');
    }

    /**
     * @Route(path="/id/{id}")
     * @return Response
     */
    public function details() {
        return $this->renderCustomView('front-end/eden/pages/all.packs.html.twig');
    }



}