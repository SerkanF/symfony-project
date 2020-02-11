<?php

namespace App\Controller\BackEndRestController;

use App\Controller\AbfFrontAbstractController;
use App\Entity\User;
use App\Repository\UserRepository;
use App\Services\Logger\AbfLoggerService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Class GroupAnnotation
 * @package App\RoutingAnnotations
 * @Route(path="/admin/api/users")
 * @IsGranted("ROLE_ADMIN")
 */
class AdminUserRestController extends AbfFrontAbstractController {

    public function __construct(AbfLoggerService $logger, UserRepository $userRepository) {
        parent::__construct($logger);
    }

    /**
     * @Route(methods={"GET"} )
     * @param UserRepository $userRepository
     * @return JsonResponse
     */
    public function getUsers(UserRepository $userRepository) : JsonResponse {

        $users = $userRepository->findAll();

        $response = new JsonResponse();
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');

        $response->setData($users);

        return $response;

    }

    /**
     * @Route(methods={"POST"} )
     * @param Request $request
     * @param UserPasswordEncoderInterface $encoder
     */
    public function createUser(Request $request, UserPasswordEncoderInterface $encoder) {

        $data = json_decode($request->getContent(), true);

        $user = new User();

        $user->setUsername($data['username']);
        $user->setPassword($encoder->encodePassword($user, $data['password']));
        $user->setEmail($data['email']);
        $user->setRoles($data['roles']);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($user);
        $entityManager->flush();

        $this->logger->info($this, "User created");

    }


}