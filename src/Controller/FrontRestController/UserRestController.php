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

                $req = 'INSERT INTO `user` (`id`, `email`, `roles`, `password`, `username`, `id_account`, `key_confirmation`, `is_confirmed`)' 
                    . ' VALUES '
                    . ' (null, "'.$formData['email'].'", "[]", "$argon2id$v=19$m=65536,t=4,p=1$Q3lOd2t6OTBKaExPRUlKUA$5WEG4sUcJWB+B0H1NuFz7g/u+NB45z+7HjWdYa/KQR0", "'.$formData['email'].'", null, "' . uniqid() . '", 0);';

                Util::executeInsertRequest($this->getDoctrine()->getConnection(), $req);

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