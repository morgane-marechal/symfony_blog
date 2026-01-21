<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class WritingController extends AbstractController
{
    #[Route('/writing', name: 'app_writing')]
    public function index(Request $request, EntityManagerInterface $xo): Response
    {
        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $article->setAuthor($this->getUser());
            $article->setCreatedAt(new \DateTimeImmutable());

            $xo->persist($article);
            $xo->flush();

            $this->addFlash('success', 'Article publié !');

            return $this->redirectToRoute('app_home');
        }
        return $this->render('writing/index.html.twig', [
            'form' => $form->createView(), 
        ]);
    }
}
