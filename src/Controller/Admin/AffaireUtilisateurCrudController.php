<?php

namespace App\Controller\Admin;

use App\Entity\AffaireUtilisateur;
use App\Repository\UtilisateurRepository;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;

class AffaireUtilisateurCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return AffaireUtilisateur::class;
    }


    public function configureFields(string $pageName): iterable
    {


        return [
            IdField::new('id')
                ->setFormTypeOption('disabled','disabled'),

            AssociationField::new('utilisateur')
                ->setFormTypeOptions(['query_builder' => function (UtilisateurRepository $em) {
                    return $em->createQueryBuilder('i')
                        ->andWhere('i.departement = :dep')
                        ->setParameter('dep', $this->getUser()->getDepartement());
                }]),
            AssociationField::new('affaire'),
            AssociationField::new('utilisateur'),
            BooleanField::new('isRevoked'),
        ];
    }

}
