<?php

namespace App\Controller;

use App\Entity\User;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\User\UserInterface;
use Twig\Environment;
use function MongoDB\BSON\toJSON;

class HomeController extends AbstractController {

    /**
     * @var Environment
     */
    private $twig;

    public function __construct(Environment $twig) {
        $this->twig = $twig;
    }

    public function index(UserInterface $user, LoggerInterface $logger) {

        $currentUser = $this->getUser();

        $currentUser->getUserName();
        $currentUser->getEmail();

        $logger->info('UserName : ' . $currentUser->getUserName() . " email : " . $currentUser->getEmail());

        return new Response($this->twig->render('base.html.twig'));
    }

    public function home(UserInterface $user, LoggerInterface $logger) {

        $logger->info("User :" . $user->getUsername());

        return new Response('Home page');
    }

}
