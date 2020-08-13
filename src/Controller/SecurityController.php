<?php

namespace App\Controller;

use App\Entity\AglUser;
use App\Entity\User;
use App\Form\UserFormRegistrationType;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Psr\Log\LoggerInterface;

class SecurityController extends AbfFrontAbstractController {

    /**
     * @Route("/login", name="app_login")
     * @IsGranted("IS_AUTHENTICATED_ANONYMOUSLY")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        if ($this->getUser()) {
             return $this->redirectToRoute('home');
        }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        $this->data['last_username'] = $lastUsername;
        $this->data['error'] = $error;

        return $this->renderCustomView('security/login.html.twig');

        // return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        
//        throw new \Exception('This method can be blank - it will be intercepted by the logout key on your firewall');
        return $this->renderCustomView('home');
    }
}
