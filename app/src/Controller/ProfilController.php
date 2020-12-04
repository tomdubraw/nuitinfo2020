<?php

namespace App\Controller;

use App\Repository\TripRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfilController extends AbstractController
{
    /**
     * @Route("/profil/{page}", name="profil")
     */
    public function index(TripRepository $repository, PaginatorInterface $paginator, $page = 1): Response
    {
        $pagination = $paginator->paginate(
            $repository->getTripByUserQuery($this->getUser()),
            $page,
            15
        );

        return $this->render('profil/index.html.twig', [
            'trips' => $pagination,
        ]);
    }
}
