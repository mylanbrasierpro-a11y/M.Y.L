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

final class AccueilController extends AbstractController
{
    #[Route('/', name: 'app_accueil')]
    public function index(PostsRepository $postrepository, Security $security): Response
    {

        $form = $this->createForm(CommentType::class);
        $post = $postrepository->findBy([], ['id' => 'DESC']);
        $user = $security->getUser();

        return $this->render('accueil/index.html.twig', [
            'posts' => $post,
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

    #[Route('/update/{id}', name:'update_article')]
    public function modify(Posts $posts ,PostsRepository $postrepository, Request $request, EntityManagerInterface $entityManager ): Response
    {
    // dd('test');
    // if ($posts->getId() && $posts->getUser() !== $this->getUser()) {

    // // interdit l'accès
    // return $this->redirectToRoute('app_accueil');        
    // }

    // $form = $this->createForm(UpdateType::class, $posts);

    // $user = $this->getUser();

    // $form->handleRequest($request);

    // if($form->isSubmitted() && $form->isValid()){

    //     $entityManager->persist($posts);

    //     $entityManager->flush();

    //     $this->addFlash('success', ' Le post a été modifié avec succés !');

    //     return $this->redirectToRoute('app_accueil');
        
    // }
        return $this->render('updatepost/index.html.twig', [
            'update' =>$form->createView(),
            'user' => $user,
        ]);
         
        }
        #[Route('/suppr/article/{id}', name: 'delete_article')]
        public function delete(Posts $posts, Request $request, EntityManagerInterface $entityManager): Response
        {
            if ($this->isCsrfTokenValid("SUP" . $posts->getId(), $request->get('_token'))) {
                $entityManager->remove($posts);
                $entityManager->flush();
                $this->addFlash("success", "La suppression a été effectuée");
                return $this->redirectToRoute("app_accueil");
            }
        }
}