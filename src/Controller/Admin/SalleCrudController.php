<?php

namespace App\Controller\Admin;

use App\Entity\Salle;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class SalleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Salle::class;
    }

    public function configureFields(string $pageName): iterable
    {
    return [
       IdField::new('id_salle')->hideOnForm(), 
       TextField::new('nom'),
       NumberField::new('capacite'),
       AssociationField::new('ergonomie'),
       AssociationField::new('materiels'),
       AssociationField::new('logiciels'),
    ];
    }
    public function persistentity(EntityManagerInterface $em, $entityInstance): void
    {
        if (!$entityInstance instanceof Salle) return;
       $entityInstance->setIdSalle('5');
       parent::persistEntity($em, $entityInstance);
   
    }
}
