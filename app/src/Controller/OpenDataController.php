<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class OpenDataController extends AbstractController
{
    /**
     * @Route("/openData", name="app_openData")
     */
    public function windyRoute()
    {
        return $this->render('openData/openData.html.twig');
    }
}
