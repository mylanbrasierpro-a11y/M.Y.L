<?php

namespace App\Controller;

use Symfony\Component\Uid\Uuid;
use App\Form\NewpasswordType;
use App\Form\ResetpasswordType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;



final class ResetpasswordController extends AbstractController
{
    #[Route('/resetpassword', name: 'app_resetpassword')]
    public function request(Request $request, UserRepository $userRepository, EntityManagerInterface $entityManager, MailerInterface $mailer): Response
    {
        $form = $this->createForm(ResetpasswordType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $email = $form->get('email')->getData();
            $user = $userRepository->findOneBy(['email' => $email]);

            if($user) {
                $token = Uuid::v4()->toRfc4122();
                $user->setResetToken($token);
                $user->setResetTokenExpiresAt((new \DateTime())->modify('+1 hour'));
                $entityManager->flush();

                $resetLink = $this->generateUrl('app_newpassword', ['token' => $token], UrlGeneratorInterface::ABSOLUTE_URL);
                $email = (new Email())
                    ->from('noreply@yourdomain.com')
                    ->to($user->getEmail())
                    ->subject('Réinitialisation de votre mot de passe')
                    ->text('Voici votre lien de reinitialisation:' . $resetLink);
                    $mailer->send($email);
                    $this->addFlash('success', 'Un email de réinitialisation a été envoyé.');

                    return $this->redirectToRoute('app_login');
            }
            $this->addFlash('error','Aucun utilisateur a été trouver avec cette email.');
        }
        return $this->render('resetpassword/index.html.twig', [
            'controller_name' => $form->createView(),
        ]);
    }
    #[Route('/newpassword/{token}', name: 'app_newpassword')]
    public function reset(string $token ,Request $request, UserRepository $userRepository, EntityManagerInterface $entityManager): Response
    {
        $user = $userRepository->findOneBy(['resetToken' => $token]);

        if (!$user || !$user->isResetTokenValid()) {
            $this->addFlash('error', 'Le lien de réinitialisation est invalide ou expiré.');
            return $this->redirectToRoute('app_resetpassword');
        }

        $form = $this->createForm(NewpasswordType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $Password = $form->get('plainPassword')->getData();
            $hashedPassword = password_hash($Password, PASSWORD_BCRYPT);
            $user->setPassword($hashedPassword);

            $user->setResetToken(null);
            $user->setResetTokenExpiresAt(null);

            $entityManager->flush();

            $this->addFlash('success', 'Votre mot de passe a été réinitialisé avec succès.');
            return $this->redirectToRoute('app_login');
        }

        return $this->render('resetpassword/newpassword.html.twig', [
            'Newpassword' => $form->createView(),
        ]);
    }   
}