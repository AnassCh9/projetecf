<?php

namespace App\Controller;

use App\Repository\SalleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SallesController extends AbstractController
{
    #[Route('/salle', name: 'app_salle', methods: ['GET'])]
    public function index(SalleRepository $salles): Response
    {
        return $this->render('salles/index.html.twig', [
            'controller_name' => 'SallesController',
            'salles' => $salles->findAll(),
            // dd($projects->findAll())
        ]);
    }
}
