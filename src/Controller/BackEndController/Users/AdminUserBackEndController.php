<?php

namespace App\Controller\BackEndController\Users;

use App\Controller\AbfFrontAbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AdminUserBackEndController
 * @package App\Controller\BackEndController
 * @Route(path="/admin/user")
 * @IsGranted("ROLE_ADMIN")
 */
class AdminUserBackEndController extends AbfFrontAbstractController {

    /**
     * @Route(path="/")
     */
    public function index() {
        return $this->render('back-end/back-end.html.twig');
    }

}