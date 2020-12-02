<?php

namespace App\Controller\Admin;

use App\Repository\UserRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminUserController extends AbstractController
{
    /**
     * @Route("/admin/user/{page}", name="admin_user")
     */
    public function index(UserRepository $repository, PaginatorInterface $paginator, $page = 1): Response
    {
        $pagination = $paginator->paginate(
            $repository->getUserQuery(),
            $page,
            15
        );

        return $this->render('admin/user/list.html.twig', [
            'users' => $pagination,
        ]);
    }
}
