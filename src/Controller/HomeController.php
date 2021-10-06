<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("", name="index")
     */
    public function index(): Response {

        return $this->render('pages/index.html.twig');
    }

    /**
     * @Route("/mon-compte", name="mon-compte")
     */
    public function monCompte(CategoryRepository $categoryRepository): Response {

        $allCategories = $categoryRepository->findAll();
        return $this->render('pages/mon-compte.html.twig', [
            'allCategories' => $allCategories
        ]);
    }
}
