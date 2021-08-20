<?php

namespace App\Controller\Admin;

use App\Entity\Departement;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class DepartementCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Departement::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                ->setFormTypeOption('disabled','disabled'),
            TextField::new('nom'),
            TextField::new('description'),
            DateTimeField::new('ceatedAt')
                ->setFormTypeOption('disabled','disabled'),
            AssociationField::new('utilisateurs')
                ->setFormTypeOptions([
                    'by_reference' => false,
                ]),
        ];
    }

}
