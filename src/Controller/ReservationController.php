<?php

namespace App\Controller;

use App\Entity\Reservation;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReservationController extends AbstractController
{
    #[Route('/reservation', name: 'app_reservation')]
    public function index(): Response
    {
        return $this->render('reservation/index.html.twig', [
            'controller_name' => 'ReservationController',
        ]);
    }

    // Route qui permet de créer une nouvelle note
    // #[Route('/reservation', name: 'app_reservation', methods: ['GET', 'POST'])]
    // public function newReservation(Request $request)
    // {
    //     $oneReservation = new Reservation();

    //     $oneReservation = $this->createForm(ReservationType::class, $oneReservation);

    //     return $this->render('reservation/index.html.twig', [
    //         // Formulaire de création de note
    //         'form' => $oneReservation->createView()

    //     ]);

    // }

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
