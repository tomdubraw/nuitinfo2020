<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class WindyController extends AbstractController
{
    /**
     * @Route("/windy", name="app_windyCarte")
     */
    public function windyRoute()
    {
        return $this->render('windyCarte/windyCarteFull.html.twig');
    }
}