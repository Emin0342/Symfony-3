<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConcepteurController extends AbstractController
{
    #[Route('/concepteur', name: 'app_concepteur')]
    public function index(): Response
    {
        return $this->render('concepteur/index.html.twig', [
            'controller_name' => 'ConcepteurController',
        ]);
    }
}
