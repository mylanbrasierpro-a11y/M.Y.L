<?php

namespace App\Controller;

use App\Entity\Posts;
use App\Form\AddpostType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AddController extends AbstractController
{
    #[Route('/addpost', name: 'app_addpost')]
    public function addArticle(Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();

        $post = new Posts();
        
        $post->setUser($user);

        $form = $this->createForm(AddpostType::class, $post);
        
        $form->handleRequest($request);
        if($form->isSubmitted()&& $form->isValid()){

            $entityManager->persist($post);

            $entityManager->flush();

            $this->addFlash('success', 'Article a ajouté avec succés !');

            return $this->redirectToRoute('app_accueil');
}
        return $this->render('add/index.html.twig', [
            'addpost' =>$form->createView(),
        ]);
    }
}