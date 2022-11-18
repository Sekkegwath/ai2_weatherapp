<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends AbstractController
{
    #[Route('/login', name: 'app_login')]
    public function index(AuthenticationUtils $utils): Response
    {
        $last_username = $utils->getLastUsername();
        $error = $utils->getLastAuthenticationError();
        return $this->render('login/index.html.twig', [
            'controller_name' => 'LoginController',
            'last_username' => $last_username,
            'error' => $error
        ]);
    }
}
