<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function root()
    {
        /** @var User $user */
        if (null === $user = $this->getUser()) {
            return $this->redirectToRoute('home');
        } elseif (null === $user->getOrganization()) {
            return $this->redirectToRoute('app_openData');
        } else {
            return $this->redirectToRoute('app_windyCarte');
        }
    }

    /**
     * @Route("/home", name="home")
     */
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
