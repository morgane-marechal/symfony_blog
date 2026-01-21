<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\ArticleRepository;
use App\Repository\UserRepository;


final class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    // public function index(): Response
    public function index(ArticleRepository $articleRepository): Response
    // {
    //     return $this->render('home/index.html.twig', [
    //         'controller_name' => 'HomeController',
    //     ]);
    // }

    {
        $articles = $articleRepository->findBy(
            [],
            ['createdAt' => 'DESC']
        );

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'articles' => $articles,
        ]);
    }
}

