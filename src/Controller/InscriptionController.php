<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\InscriptionType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;

final class InscriptionController extends AbstractController
{
       #[Route('/inscription',name:'inscription')]
    public function adduser(Request $request, EntityManagerInterface $entityManager, UserPasswordHasherInterface $passwordEncoder):Response
    {
        $user = new User();

        $form = $this->createForm(InscriptionType::class, $user);

        $form->handleRequest($request);

        if($form->isSubmitted()&& $form->isValid()){

            $user->setRoles(['ROLE_USER']);
                    $user->setPassword(
                        $passwordEncoder->hashpassword($user,$form->get('password')->getData())
                    );
            $entityManager->persist($user);

            $entityManager->flush();

            $this->addFlash('success', 'User ajouté avec succés !');

            

            return $this->redirectToRoute('app_accueil');
        }
        return $this->render('inscription/index.html.twig', [
            'inscription'=>$form->createView(),
        ]);
    }
}