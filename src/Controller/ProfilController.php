<?php

namespace App\Controller;

use App\Entity\Posts;
use App\Entity\User;
use App\Form\UpdateType;
use App\Form\UpdateuserType;
use App\Repository\PostsRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ProfilController extends AbstractController
{
#[Route('/profil/{id}', name: 'app_profil', requirements: ['id' => '\d+'])]
    public function public(int $id, UserRepository $userRepository, Security $security): Response
    {

        $currentUser = $security->getUser();

        $user = $userRepository->find($id);

        if (!$user) {
            throw $this->createNotFoundException('Utilisateur introuvable.');
        }

        return $this->render('profil/index.html.twig', [
            'user' => $user,
            'currentUser' => $currentUser,
        ]);
    }

    #[Route('/update/{id}', name:'update_article')]

    public function modify(Posts $posts ,PostsRepository $postrepository, Request $request, EntityManagerInterface $entityManager ): Response
    {

    if ($posts->getId() && $posts->getUser() !== $this->getUser()) {

    return $this->redirectToRoute('app_accueil');        
    }
    $form = $this->createForm(UpdateType::class, $posts);

    $form->handleRequest($request);

    if($form->isSubmitted() && $form->isValid()){

        $entityManager->persist($posts);

        $entityManager->flush();

        $this->addFlash('success', ' Le post a été modifié avec succés !');

        return $this->redirectToRoute('app_accueil');
    }
        return $this->render('updatepost/index.html.twig', [
            'update' =>$form->createView(),
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

    #[Route('/updateuser/{id}', name:'update_user')]

    public function modifyuser(User $user ,UserRepository $userrepository, Request $request, EntityManagerInterface $entityManager ): Response
    {  
        if ($user->getEmail() !== $this->getUser()->getUserIdentifier()) {

        return $this->redirectToRoute('app_accueil');

    }

    $form = $this->createForm(UpdateuserType::class, $user);

    $form->handleRequest($request);
    if($form->isSubmitted() && $form->isValid()){

        $entityManager->persist($user);

        $entityManager->flush();

        $this->addFlash('success', ' Le profil a été modifié avec succés !');
        $user->setImageFile(null);

        return $this->redirectToRoute('app_profil', ['id' => $user->getId()]);
    }
        return $this->render('updateuser/index.html.twig', [
            'updateuser' =>$form->createView(),
            'user'=> $user,
        ]);
         
    }
}