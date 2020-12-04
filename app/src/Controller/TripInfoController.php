<?php

namespace App\Controller;

use App\Repository\TripRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TripInfoController extends AbstractController
{
    /**
     * @Route("/trip/info/{id}", name="trip_info")
     */
    public function index(TripRepository $repository, int $id = 0): Response
    {
        $trip = $repository->find($id);

        return $this->render('trip_info/index.html.twig', [
            'trip' => $trip,
        ]);
    }
}
