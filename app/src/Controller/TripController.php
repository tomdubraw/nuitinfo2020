<?php

namespace App\Controller;

<<<<<<< HEAD
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
=======
use App\Entity\Trip;
use App\Entity\User;
use App\Form\TripType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
>>>>>>> dev
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TripController extends AbstractController
{
    /**
     * @Route("/trip", name="trip")
     */
    public function index(): Response
    {
        return $this->render('trip/index.html.twig');
    }

    /**
     * @Route("/trip/create", name="trip_create")
     */
    public function create(Request $request, EntityManagerInterface $entityManager)
    {
        /** @var User $user */
        if (null === $user = $this->getUser()) {
            throw $this->createAccessDeniedException();
        }
        $watterman = $user->getWaterman();
        if (null === $watterman) {
            throw $this->createAccessDeniedException();
        }

        $trip = new Trip();
        $form = $this->createForm(TripType::class, $trip);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var Trip $trip */
            $trip = $form->getData();
            $trip->setWaterman($watterman);

            $entityManager->persist($trip);
            $entityManager->flush();
        }

        return $this->render('trip/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
