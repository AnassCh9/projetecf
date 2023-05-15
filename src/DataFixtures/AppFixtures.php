<?php

namespace App\DataFixtures;

use App\Entity\Ergonomie;
use App\Entity\Materiels;
use App\Entity\Salle;
use App\Entity\Logiciels;
use App\Entity\Reservation;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        
        for ($i=0; $i < 9; $i++) {
            $note = new Salle();
            $note->setIdSalle($i)
            ->setNom('Salle numéro ' . $i)
            ->setCapacité( $i);
            
            // Ajoute la note à la base de données
            $manager->persist($note);
        }

        for ($i=0; $i < 9; $i++) {
            $note = new Ergonomie();
            $note->setIdErgo($i)
            ->setPMR(0)
            ->setLumierjour(1)
            ->setLumierearti('Projecteur');
            
            // Ajoute la note à la base de données
            $manager->persist($note);
        }

        for ($i=0; $i < 9; $i++) {
            $note = new Logiciels();
            $note->setIdLogiciel($i)
            ->setNom('Logiciels numéro ' . $i);

            
            // Ajoute la note à la base de données
            $manager->persist($note);
        }

        for ($i=0; $i < 9; $i++) {
            $note = new Materiels();
            $note->setIdMateriel($i)
            ->setNom('Materiels numéro ' . $i);
        
            
            // Ajoute la note à la base de données
            $manager->persist($note);
        }

        // for ($i=0; $i < 9; $i++) {
        //     $note = new Reservation();
        //     $note->setIdReservation($i)
        //     ->setUser(0)
        //     ->setDateHeureReservation(new \DateTimeImmutable('now'))
        //     ->setSalleReserver('Salle numéro ' . $i);
            
        //     // Ajoute la note à la base de données
        //     $manager->persist($note);
        // }
        $manager->flush();
    }
}