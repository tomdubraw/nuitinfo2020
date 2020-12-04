<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

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
