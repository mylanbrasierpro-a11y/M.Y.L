<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HommageController extends AbstractController
{
    #[Route('/hommage', name: 'app_hommage')]
    public function index(): Response
    {
        return $this->render('hommage/index.html.twig', [
            'controller_name' => 'HommageController',
        ]);
    }
}
