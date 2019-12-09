<?php

namespace App\Controller;

use App\Entity\AglUser;
use App\Form\UserRegistrationType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SecurityController extends AbstractController
{
    /**
     * @Route("/registration", name="security.registration")
     */
    public function registration()
    {
        $user = new AglUser();

        $form = $this->createForm(UserRegistrationType::class, $user);

        return $this->render('security/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
