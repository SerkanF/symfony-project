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
use App\Util\Validator;
use Exception;
use App\Util\Util;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

/**
 * Class GroupAnnotation
 * @package App\RoutingAnnotations
 * @Route(path="/api/users")
 */
class UserRestController extends AbfFrontAbstractController {

    private $mailer;
    private $encoder;

    public function __construct(AbfLoggerService $logger, MailerInterface $mailer, UserPasswordEncoderInterface $encoder) {
        parent::__construct($logger);
        $this->mailer = $mailer;
        $this->encoder = $encoder;
    }

    /**
     * @Route(path="/createAdminUser", methods={"GET"} )
     * @param UserPasswordEncoderInterface $encoder
     */
    public function createAdminUser() {

        $user = new User();
        $user->addRole("ROLE_ADMIN");
        $user->setEmail("admin@gmail.com");
        $user->setPassword($this->encoder->encodePassword($user, "admin"));
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

        $formData = json_decode($request->getContent(), true);

        $resp = new Response();
        $response = new JsonResponse();
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');

        try {
            if (Validator::formRegisterIsValid($formData) && Validator::isAccountIsFree($this->getDoctrine(), $formData)) {
                $resp->setErrorCode(null);
                $resp->setMessage("Le compte a été créé avec succès");
                $resp->setStatus(200);
                $response->setStatusCode(200);

                $key = uniqid();

                $password = $this->encoder->encodePassword(new User(), $formData['password']);

                $req = 'INSERT INTO `user` (`id`, `email`, `roles`, `password`, `username`, `id_account`, `key_confirmation`, `is_confirmed`, `md5_password`)' 
                    . ' VALUES '
                    . ' (null, "'.$formData['email'].'", "[]", "'.$password.'", "'.$formData['email'].'", null, "' . $key . '", 0, "'.md5($formData['password']).'");';

                Util::executeInsertRequest($this->getDoctrine()->getConnection(), $req);

                $email = (new Email())
                    ->from('promonitor@agentil.com')
                    ->to('shiyatsu70@gmail.com')
                    //->cc('cc@example.com')
                    //->bcc('bcc@example.com')
                    //->replyTo('fabien@example.com')
                    //->priority(Email::PRIORITY_HIGH)
                    ->subject("Confirmation account")
                    ->text('Hello, please could click on link')
                    ->html('<p> <a href="http://edeneternal.to/validation/key/'.$key.'">VALIDATE YOUR ACCOUNT</a>  <p>');

                $this->mailer->send($email);

            }
        } catch (Exception $e) {
            $resp->setErrorCode(501);
            $resp->setMessage($e->getMessage());
            $resp->setStatus(500);
            $response->setStatusCode(500);
        }

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