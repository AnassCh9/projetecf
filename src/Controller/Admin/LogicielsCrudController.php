<?php

namespace App\Controller\Admin;

use App\Entity\Logiciels;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class LogicielsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Logiciels::class;
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
