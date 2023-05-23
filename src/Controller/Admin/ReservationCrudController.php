<?php

// namespace App\Controller\Admin;

// use App\Entity\Reservation;
// use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
// use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
// use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

// class ReservationCrudController extends AbstractCrudController
// {
//     public static function getEntityFqcn(): string
//     {
//         return Reservation::class;
//     }

    
//     public function configureFields(string $pageName): iterable
//     {
//         return [
//            IdField::new('id'),
//             TextField::new('title'),
//             TextEditorField::new('description'),
//         ];
//     }
    
// }





namespace App\Controller\Admin;

use App\Entity\Reservation;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ReservationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Reservation::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            ChoiceField::new('id_reservation')->setChoices([
                'En attente' => 'en_attente',
                'Confirmé' => 'confirme',
                'Annulé' => 'annule',]),
            // TextField::new('email'),
            // AssociationField::new('salle'),
            DateTimeField::new('date_heure_reservation')
            // ChoiceField::new('status')->setChoices([
            // 'En attente' => 'en_attente',
            // 'Confirmé' => 'confirme',
            // 'Annulé' => 'annule',])
        ];
    }
};
