<?php

namespace App\Controller;

use App\Repository\TripRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OpenDataController extends AbstractController
{
    /**
     * @Route("/openData", name="app_openData")
     */
    public function openDataRoute()
    {
        return $this->render('openData/openData.html.twig');
    }

    /**
     * @Route("/tripcities", name="tripcities")
     */
    public function getAllCity(TripRepository $tripRepository)
    {
        $response = new Response();
        $response->setContent(json_encode($tripRepository->getCities()));

        return $response;
    }
}
