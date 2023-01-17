<?php

namespace App\Controller;

use App\Repository\CategoriesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StatistiqueController extends AbstractController
{
    #[Route('/statistique', name: 'app_statistique')]
    public function index(CategoriesRepository $categoriesRepository): Response
    {
        return $this->render('statistique/index.html.twig', [
            'categories' => $categoriesRepository->findBy([], ['name' => 'asc'])
        ]);
    }
}
