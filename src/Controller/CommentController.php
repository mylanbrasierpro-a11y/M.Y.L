<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\Posts;
use App\Form\CommentType;
use App\Repository\PostsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CommentController extends AbstractController
{
    #[Route('/voir-plus/{id}', name: 'app_voirplus')]
    public function index(Posts $post,PostsRepository $postrepository,Security $security): Response
    {
        $form = $this->createForm(CommentType::class);
        $user = $security->getUser();

        return $this->render('voirplus/voirplus.html.twig', [
            'post' => $post,
            'user' => $user,
            'comment' => $form->createView(),
        ]);
    }
    
    #[Route('/add/comment/{id}', name: 'app_comment')]
    public function addComment(Posts $post,Request $request,EntityManagerInterface $em): Response 
    {

        $comment = new Comment();
        $form = $this->createForm(CommentType::class, $comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $comment->setUser($this->getUser()); 
            $comment->setPost($post);      

            $em->persist($comment);
            $em->flush();

            $this->addFlash('success', 'Commentaire ajouté !');
        }
            

        return $this->redirectToRoute('app_accueil');
    }
}
