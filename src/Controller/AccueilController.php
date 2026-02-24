<?php

namespace App\Controller;

use App\Repository\PostsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AccueilController extends AbstractController
{
    #[Route('/', name: 'app_accueil')]
    public function index(PostsRepository $postrepository): Response
    {
        $post = $postrepository->findAll();
        return $this->render('accueil/index.html.twig', [
            'posts' => $post,]);
    }
}
