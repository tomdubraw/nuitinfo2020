<?php

namespace App\Controller;

use App\Entity\FavCity;
use App\Repository\FavCityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
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

    /**
     * @Route("/favcities", name="favcities")
     */
    public function getFavCities(FavCityRepository $favCityRepository)
    {
        $response = new Response();
        $response->setContent(json_encode($favCityRepository->getCities($this->getUser())));

        return $response;
    }
}
