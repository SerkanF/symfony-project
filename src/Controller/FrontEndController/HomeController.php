<?php

namespace App\Controller\FrontEndController;

use App\Controller\AbfFrontAbstractController;
use App\Entity\User;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Util\Util;

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

    /**
     * @Route(path="/register", name="register")
     * @return 
     */
    public function register() {
        return $this->renderCustomView('front-end/eden/pages/register.html.twig');
    }

    /**
     * @Route(path="/validation/key/{key}", name="validation")
     * @return 
     */
    public function validation($key) {

        $req = "SELECT * "
                . " FROM USER u "
                . " WHERE u.key_confirmation = '".$key."';";

        $data = Util::executeSqlRequest($this->getDoctrine()->getConnection(), $req);

        if (count($data) > 0) {

            if ($data[0] != null && $data[0]['is_confirmed'] != null)

            if ($data[0]['is_confirmed'] == 0) {
                // Finalise la création du compte

                $req = "SELECT MAX(acc.id) AS MAX from public.accounts acc;";

                $dataId = Util::executeSqlRequest($this->getDoctrine()->getConnection("fnaccount"), $req);

                $id = null;

                if ($dataId[0] != null && $dataId[0]['max'] != null) {
                    $id = intval($dataId[0]['max']) + 1;

                    $req = "INSERT INTO public.accounts( "
                        . " id, username, password, realname, worldserver, state, health_offline_time, last_save_health_time "
                        . " ) "
                        . " VALUES (".$id.", '".$data[0]['username']."', '".$data[0]['md5_password']."', null, 1010, 0, 0, 0);";

                    Util::executeInsertRequest($this->getDoctrine()->getConnection("fnaccount"), $req);

                    $req2 = "INSERT INTO public.tb_user( "
                        . " mid, password, pwd, idnum, memberid "
                        . " ) "
                        . " VALUES ('".$data[0]['username']."', '', '".$data[0]['md5_password']."', ".$id.", '');";

                    Util::executeInsertRequest($this->getDoctrine()->getConnection("fnmember"), $req2);

                }

                $this->data['error'] = false;
                $this->data['message'] = $req;
                $this->data['message2'] = $req2;
            } else {
                $this->data['error'] = true;
                $this->data['message'] = "Account already confirmed";
            }
        } else {
            $this->data['error'] = true;
            $this->data['message'] = "Key not found";
        }

        return $this->renderCustomView('front-end/eden/pages/validation.html.twig');
    }

}