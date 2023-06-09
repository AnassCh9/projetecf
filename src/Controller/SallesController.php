<?php

namespace App\Controller;

use App\Repository\SalleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

    // Route qui affiche une Salle en particulier
    #[Route('/salle/{id}', name: 'app_one_salle', methods: ['GET', 'POST'])]
    public function show($id, SalleRepository $oneSalle): Response
    {
        // Affiche la salle demandée dans le template dédié
        return $this->render('salles/single.html.twig', [
            // Récupère la salle demandée par son id
            'oneSalle' => $oneSalle->findOneBy(
                ['id' => $id]
            ),
            'salle' => $oneSalle->findBy(
                [],
                ['id' => 'DESC'],
                3)
        ]);
        
    }

    // #[Route('rentsalle/{id}', name: 'rentsalle', methods: ['GET', 'POST'])]
    // public function updateSalle(
    //     $id, 
    //     SalleRepository $oneSalle, 
    //     Request $request, 
    //     EntityManagerInterface $em
    //     ): Response
    // {
    //     $oneSalle = $oneSalle->findOneBy(['id' => $id]);
    //     $form = $this->createForm(NoteType::class, $oneSalle);

    //     $form->handleRequest($request);
    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $oneSalle->setTitle($form->get('title')->getData());
    //         $oneSalle->setAuthor($form->get('author')->getData());
         

    //         $em->persist($oneNote);
    //         $em->flush();

    //         return $this->redirectToRoute('show_note', [
    //             'id' => $oneNote->getId()
    //         ]);
    //     }

    //             return $this->render('note/update.html.twig', [
    //                 'note' => $oneNote,
    //                 'form' => $form->createView()
    //             ]);
    // }
}
