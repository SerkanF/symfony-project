<?php

namespace App\RoutingAnnotations;

use App\Entity\User;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SimpleAnnotation {

    public function __construct() {

    }

    /**
     * @Route(path="/simple")
     * @return Response
     */
    public function index() {
        return new Response('simple annotation');
    }

    /**
     * @Route(path="/simple/list")
     * @return Response
     */
    public function list() {
        return new Response('simple list');
    }

    /**
     * @Route(path="/users/create")
     * @param EntityManager $manager
     * @return JsonResponse
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function createUser(EntityManagerInterface $manager, UserPasswordEncoderInterface $passwordEncoder) : JsonResponse {

        $user = new User();

        $user->setPassword($passwordEncoder->encodePassword($user,"toto"));
        $user->setEmail("toto@gmail.com");
        $user->setUsername("toto");
        $user->setRoles(['ROLE_USER']);

        $manager->persist($user);
        $manager->flush();

        return new JsonResponse($user);

    }

}