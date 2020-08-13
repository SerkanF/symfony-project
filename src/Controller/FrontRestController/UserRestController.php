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

                $key = uniqid();

                $password = $this->encoder->encodePassword(new User(), $formData['password']);

                $req = 'INSERT INTO `user` (`id`, `email`, `roles`, `password`, `username`, `id_account`, `key_confirmation`, `is_confirmed`, `md5_password`)' 
                    . ' VALUES '
                    . ' (null, "'.$formData['email'].'", "[]", "'.$password.'", "'.$formData['username'].'", null, "' . $key . '", 0, "'.md5($formData['password']).'");';

                Util::executeInsertRequest($this->getDoctrine()->getConnection(), $req);

                $email = (new Email())
                    ->from('contact.edeneternal.to@gmail.com')
                    ->to($formData['email']) // $formData['email']
                    ->subject("Confirmation")
                    ->html('<p> 
                            <p>Bienvenu '.$formData['username'].' !</p>
                            <p>Pour finir la création de votre compte, veuillez cliquer sur ce lien :</p>
                            <a href="http://edeneternal.to/validation/key/'.$key.'">Valider mon compte</a> 
                        <p>');

                $this->mailer->send($email);

                $resp->setErrorCode(null);
                $resp->setMessage("Le compte a été créé avec succès. Un email vous a été envoyé pour finaliser la création de votre compte");
                $resp->setStatus(200);
                $response->setStatusCode(200);

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

}