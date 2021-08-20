<?php

namespace App\Controller\Admin;

use App\Entity\Affaire;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class AffaireCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Affaire::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('numeroMatricule')
                ->setFormTypeOption('disabled','disabled'),
            TextField::new('nom'),
            TextEditorField::new('description'),
            NumberField::new('niveauAccreditation'),
            TextField::new('source'),
            TextEditorField::new('resume'),
            TextField::new('source'),
        ];
    }

    public function createEntity(string $entityFqcn)
    {
        $affaire = new Affaire();
        $affaire->setCreatedBy($this->getUser());
        $affaire->setDepartement($this->getUser()->getDepartement());

        return $affaire;
    }

}
