<?php

namespace App\Controller;

use App\Entity\Posts;
use App\Form\UpdateType;
use App\Repository\PostsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
    #[Route('/update/{id}', name:'update_article')]

    public function modify(Posts $posts ,PostsRepository $postrepository, Request $request, EntityManagerInterface $entityManager ): Response
    {
    $form = $this->createForm(UpdateType::class, $posts);

    $form->handleRequest($request);

    if($form->isSubmitted() && $form->isValid()){

        $entityManager->persist($posts);

        $entityManager->flush();

        $this->addFlash('success', ' Le post a été modifié avec succés !');

        return $this->redirectToRoute('app_accueil');
    }
        return $this->render('update/index.html.twig', [
            'update' =>$form->createView(),
        ]);
         
}
}