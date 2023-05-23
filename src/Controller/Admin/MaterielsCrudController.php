<?php

namespace App\Controller\Admin;

use App\Entity\Materiels;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class MaterielsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Materiels::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
