<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\ArticleRepository;
use App\Repository\UserRepository;

final class ArticleController extends AbstractController
{
    #[Route('/article', name: 'app_article')]
    public function index(ArticleRepository $articleRepository): Response
    {
        $articles = $articleRepository->findBy(
            [],
            ['createdAt' => 'DESC']
        );

        return $this->render('home/index.html.twig', [
            'controller_name' => 'ArticleController',
            'articles' => $articles,
        ]);
    }

    #[Route('/myarticle', name: 'app_myarticle')]
    public function myarticle(ArticleRepository $articleRepository): Response
    {
        $user = $this->getUser();
        if (!$user) {
            throw $this->createAccessDeniedException();
        }
        $articles = $articleRepository->findBy(
            ['author' => $user],
            ['createdAt' => 'DESC']
        );

        // return $this->render('home/index.html.twig', [
        //     'controller_name' => 'ArticleController',
        //     'articles' => $articles,
        // ]);

        return $this->render('article/my_articles.html.twig', [
            'controller_name' => 'ArticleController',
            'articles' => $articles,
        ]);
    }
}
