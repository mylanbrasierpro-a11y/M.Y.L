<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class SearchController extends AbstractController
{
   #[Route('/search', name: 'app_search', methods: ['GET'])]
    public function index(Request $request,UserRepository $userRepository,Security $security,): Response 
    {
        $user = $security->getUser();

        $query   = trim($request->query->get('q', ''));
        $results = [];

        if ($query !== '') {
            $results = $userRepository->search($query, $security->getUser());
        }

        return $this->render('search/index.html.twig', [
            'user' => $user,
            'query'=> $query,
            'results'=> $results,
        ]);
    }
}