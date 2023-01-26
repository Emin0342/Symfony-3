<?php

namespace App\Controller;

use App\Repository\CategoriesRepository;
use App\Repository\ProductsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductsEcransController extends AbstractController
{
    #[Route('/products/ecrans', name: 'app_products_ecrans')]
    public function index(CategoriesRepository $categoriesRepository, ProductsRepository $productsRepository): Response
    {
        return $this->render('products_ecrans/index.html.twig', [
            'controller_name' => 'ProductsEcransController',
            'categories' => $categoriesRepository->findBy([], ['name' => 'asc']),
            'produits' => $productsRepository->findByPriceUnder(50),
            'presetProduits' => $productsRepository->getProduitsOfCategory("Ecrans"),
        ]);
    }
}
