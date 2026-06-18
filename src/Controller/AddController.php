<?php

namespace App\Controller;

use App\Entity\Posts;
use App\Form\AddpostType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AddController extends AbstractController
{
    #[Route('/addpost', name: 'app_addpost')]
    public function addArticle(Request $request, EntityManagerInterface $entityManager, Security $security): Response
    {
        $user = $this->getUser();
    
        $post = new Posts();
        
        $post->setUser($user);

        $form = $this->createForm(AddpostType::class, $post);
        
        $form->handleRequest($request);    
        
        $post->setCreatedAt(new \DateTimeImmutable());  

        if($post->getImageName() == null );{
                
            $post->setImageName('post.png') ;
        }

        if($form->isSubmitted()&& $form->isValid()){           
             
        $this->addFlash('success', 'Article a ajouté avec succés !');


        $entityManager->persist($post);

        $entityManager->flush();

        $this->addFlash('success', 'Article a ajouté avec succés !');
        return $this->redirectToRoute('app_accueil');
        }
        return $this->render('add/index.html.twig', [
            'post' => $post,
            'user' => $user,
            'addpost' =>$form->createView(),
        ]);
    }
}