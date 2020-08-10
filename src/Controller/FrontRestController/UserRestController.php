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
use Symfony\Component\Validator\Constraints\Length;

/**
 * Class GroupAnnotation
 * @package App\RoutingAnnotations
 * @Route(path="/api/users")
 */
class UserRestController extends AbfFrontAbstractController {

    public function __construct(AbfLoggerService $logger) {
        parent::__construct($logger);
    }

    /**
     * @Route(path="/createAdminUser", methods={"GET"} )
     * @param UserPasswordEncoderInterface $encoder
     */
    public function createAdminUser(UserPasswordEncoderInterface $encoder) {

        $user = new User();
        $user->addRole("ROLE_ADMIN");
        $user->setEmail("admin@gmail.com");
        $user->setPassword($encoder->encodePassword($user, "admin"));
        $user->setUsername("admin");

        $repository = $this->getDoctrine()->getManager();
        $repository->persist($user);
        $repository->flush();

    }

    /**
     * @Route(path="/register", methods={"POST"} )
     * @return JsonResponse
     */
    public function postUser(Request $request) : JsonResponse {

        $data = [];

        $resp = new Response();
        $response = new JsonResponse();
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');

        $sql = "SELECT * "
            . "FROM public.accounts acc "
            . "WHERE acc.username = 'errgfwerfew';";

        // DATABASE fnaccount

        $connexion = $this->getDoctrine()->getConnection("fnaccount");

        $stmt = $connexion->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll();
        $connexion->close();

        $strLog = "DATABASE fnaccount row data : " . count($data) . "";

        $this->logger->info($this, $strLog);

        if (count($data) >= 1) {
            $strLog = "Account already exist";

            $resp->setErrorCode(501);
            $resp->setMessage("Le nom d'utilisateur est déjà pris !");
            $resp->setStatus(500);

            $response->setData($resp);

            return $response;

            $this->logger->info($this, $strLog);

        }

        // DATABASE fnmember

        $sql = "SELECT * "
            . "FROM public.tb_user u "
            . "WHERE u.mid = 'errgfwerfew' ;";

        $connexion = $this->getDoctrine()->getConnection("fnmember");

        $stmt = $connexion->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll();
        $connexion->close();

        $strLog = "DATABASE fnmember row data : " . count($data) . "";

        if (count($data) >= 1) {
            $strLog = "Account already exist in fnmember";

            $resp->setErrorCode(502);
            $resp->setMessage("Le nom d'utilisateur est déjà pris !");
            $resp->setStatus(500);

            $response->setData($resp);

            $this->logger->info($this, $strLog);

            return $response;

        }
        
        // DATABASE default

        $email = "admin@gmaileef.com";
        $username = "adminefe";

        $sql = "SELECT * " 
            . " FROM user u "
            . " WHERE u.email = '".$email."' OR u.username = '".$username."'";

        $connexion = $this->getDoctrine()->getConnection();

        $stmt = $connexion->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll();
        $connexion->close();

        if (count($data) >= 1) {
            $strLog = "Email " . $email . ", Username : " . $username . " already exist in MySQL DATABASE";

            $resp->setErrorCode(503);
            $resp->setMessage("Le nom d'utilisateur est déjà pris !");
            $resp->setStatus(500);

            $response->setData($resp);

            $this->logger->info($this, $strLog);

            return $response;
        }

        // Check capcha

        $data = json_decode($request->getContent(), true);

        var_dump($data['email']);
        var_dump($data['username']);
        var_dump($data['password']);
        var_dump($data['confirm-password']);
        var_dump($data['captcha']);

        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$this->keySecretCaptcha.'&response=');

        $responseData = json_decode($verifyResponse);

        if(!$responseData->success) {
            $this->errors['Captcha'] = Tools::displayError('##InvalidCaptcha##');
        }

        $response = new JsonResponse();
        $resp->setErrorCode(503);
        $resp->setMessage("Votre compte a été créé. Un mail de confirmation vous a été envoyé !");
        $resp->setStatus(500);

        $response->setData($resp);

        return $response;

    }

    /**
     * @Route(path="/getall", methods={"GET"} )
     * @return JsonResponse
     */
    public function getUsers() : JsonResponse {

        $connexion = $this->getDoctrine()->getConnection("fnaccount");

        $sql = "SELECT * FROM accounts LIMIT 1000 OFFSET 0";

        $stmt = $connexion->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll();
        $connexion->close();

        $response = new JsonResponse();

        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');

        $response->setData($data);

        return $response;

    }

    

}