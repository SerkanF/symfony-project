<?php

namespace App\Controller\FrontRestController;

use App\Controller\AbfFrontAbstractController;
use App\Entity\User;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Services\Logger\AbfLoggerService;
use App\Controller\FrontRestController\Response;
use App\Util\PackUtil;
use App\Util\Validator;
use Exception;
use App\Util\Util;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

/**
 * Class GroupAnnotation
 * @package App\RoutingAnnotations
 * @Route(path="/api/packs")
 */
class PackRestController extends AbfFrontAbstractController {

    private $packSending = [];

    /**
     * @Route(path="/", methods={"GET"} )
     * @return JsonResponse
     */
    public function getAll(Request $request) : JsonResponse {

        $jsonResponse = new JsonResponse();
        $jsonResponse->headers->set('Content-Type', 'application/json');
        $jsonResponse->headers->set('Access-Control-Allow-Origin', '*');

        $resp = new Response();

        $data = PackUtil::getAllContentPack($this->getDoctrine(), null);

        $resp->setMessage(json_encode($data));

        $jsonResponse->setData($data);
        return $jsonResponse;
    }

    /**
     * @Route(path="/", methods={"POST"} )
     * @return JsonResponse
     */
    public function post(Request $request) : JsonResponse {

        $jsonResponse = new JsonResponse();
        $jsonResponse->headers->set('Content-Type', 'application/json');
        $jsonResponse->headers->set('Access-Control-Allow-Origin', '*');

        $resp = new Response();

        $formData = json_decode($request->getContent(), true);

        if ($this->getUser() == null) {
            $resp->setErrorCode(null);
            $resp->setMessage("Vous devez être connecté pour recevoir le pack");
            $resp->setStatus(401);

            $jsonResponse->setStatusCode(401);
            $jsonResponse->setData($resp);

            return $jsonResponse;
        }

        try {
            
            if (Validator::isPackIsValide($this->getDoctrine(), $formData, $this->getUser()->getId())) {

                PackUtil::sendPack($this->getDoctrine(), (int) $this->getUser()->getId(), $this->getUser()->getUserName(), (int) $formData['id_pack']);

                $resp->setErrorCode(null);
                $resp->setMessage("Pack envoyé avec succès !");
                $resp->setStatus(200);

                $jsonResponse->setStatusCode(200);
                $jsonResponse->setData($resp);
            } else {
                $resp->setErrorCode(500);
                $resp->setMessage("Les données envoyées pour le pack ne sont pas valide");
                $resp->setStatus(500);

                $jsonResponse->setData($resp);
                $jsonResponse->setStatusCode(500);
            }

        } catch (Exception $e) {
            $resp->setErrorCode(500);
            $resp->setMessage($e->getMessage());
            $resp->setStatus(500);

            $jsonResponse->setData($resp);
            $jsonResponse->setStatusCode(500);
        }
        
       return $jsonResponse;
    }

}