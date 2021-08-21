<?php

namespace App\Controller\Admin;

use App\Entity\Affaire;
use App\Repository\UtilisateurRepository;
use EasyCorp\Bundle\EasyAdminBundle\Collection\FieldCollection;
use EasyCorp\Bundle\EasyAdminBundle\Collection\FilterCollection;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Dto\EntityDto;
use EasyCorp\Bundle\EasyAdminBundle\Dto\SearchDto;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Doctrine\ORM\QueryBuilder;


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


    public function createIndexQueryBuilder(SearchDto $searchDto, EntityDto $entityDto, FieldCollection $fields, FilterCollection $filters): QueryBuilder
    {

        $qb = parent::createIndexQueryBuilder($searchDto, $entityDto, $fields, $filters);
        if (!$this->isGranted('ROLE_SUPER_ADMIN')) {
            $qb->where('entity.departement = :dep');
            $qb->setParameter('dep', $this->getUser()->getDepartement());
        }
        return $qb;
    }


}
