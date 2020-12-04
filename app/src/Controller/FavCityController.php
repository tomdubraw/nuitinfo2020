<?php

namespace App\Controller;

use App\Entity\FavCity;
use App\Form\FavCityType;
use App\Repository\FavCityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FavCityController extends AbstractController
{
    /**
     * @Route("/favcity", name="fav_city")
     */
    public function index(FavCityRepository $favCityRepository): Response
    {
        $favs = $favCityRepository->findBy(['user' => $this->getUser()]);

        $fav = new FavCity();
        $form = $this->createForm(FavCityType::class, $fav);

        return $this->render('fav_city/index.html.twig', [
            'favs' => $favs,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/favcity/post", name="fav_city_post")
     */
    public function post(Request $request, EntityManagerInterface $entityManager): Response
    {
        $fav = new FavCity();
        $form = $this->createForm(FavCityType::class, $fav);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $fav = $form->getData();
            $fav->setUser($this->getUser());
            $entityManager->persist($fav);
            $entityManager->flush();
        }

        return $this->redirectToRoute('fav_city');
    }

    /**
     * @Route("/favcity/{fav}/delete", name="fav_city_delete")
     */
    public function remove(FavCity $fav, EntityManagerInterface $entityManager)
    {
        $entityManager->remove($fav);
        $entityManager->flush();

        return $this->redirectToRoute('fav_city');
    }
}
