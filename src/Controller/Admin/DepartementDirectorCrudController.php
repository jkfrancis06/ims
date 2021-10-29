<?php

namespace App\Controller\Admin;

use App\Entity\DepartementDirector;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;

class DepartementDirectorCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return DepartementDirector::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                ->setFormTypeOption('disabled','disabled'),
            AssociationField::new('departement'),
            AssociationField::new('utilisateur'),
            BooleanField::new('isRevoked'),
        ];
    }

    public function createEntity(string $entityFqcn)
    {
        $departementDir = new DepartementDirector();
        $departementDir->setCreatedAt(new \DateTime());
        $departementDir->setLastUpdate(new \DateTime());

        return $departementDir;
    }

}
