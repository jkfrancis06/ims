<?php

namespace App\Controller\Admin;

use App\Entity\CanConsult;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CanConsultCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CanConsult::class;
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
