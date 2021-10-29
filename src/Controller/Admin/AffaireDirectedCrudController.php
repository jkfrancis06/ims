<?php

namespace App\Controller\Admin;

use App\Entity\Affaire;
use App\Entity\AffaireDirected;
use App\Entity\Utilisateur;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\QueryBuilder;
use EasyCorp\Bundle\EasyAdminBundle\Collection\FieldCollection;
use EasyCorp\Bundle\EasyAdminBundle\Collection\FilterCollection;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Dto\EntityDto;
use EasyCorp\Bundle\EasyAdminBundle\Dto\SearchDto;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use MongoDB\Driver\ReadConcern;

class AffaireDirectedCrudController extends AbstractCrudController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager) {
        $this->entityManager = $entityManager;
    }

    public static function getEntityFqcn(): string
    {
        return AffaireDirected::class;
    }


   public function configureFields(string $pageName): iterable
    {


        $users = $this->entityManager->getRepository(Utilisateur::class)->findBy([
                'departement' => $this->getUser()->getDepartement()
            ]
        );

        $req = $this->entityManager->getRepository(Affaire::class)->findBy([
                'departement' => $this->getUser()->getDepartement()
            ]
        );


        if (in_array('ROLE_SUPER_ADMIN',$this->getUser()->getRoles())){
            $users = $this->entityManager->getRepository(Utilisateur::class)->findAll();
            $req = $this->entityManager->getRepository(Affaire::class)->findAll();
        }


        return [
            IdField::new('id')->setFormTypeOption('disabled','disabled'),
            AssociationField::new('affaire')->setFormTypeOptions(["choices" => $req]),
            AssociationField::new('utilisateur')->setFormTypeOptions(["choices" => $users]),
        ];
    }


    public function createIndexQueryBuilder(SearchDto $searchDto, EntityDto $entityDto, FieldCollection $fields, FilterCollection $filters): QueryBuilder
    {

        $depAffaire = $this->getUser()->getDepartement()->getAffaires();

        $qb = parent::createIndexQueryBuilder($searchDto, $entityDto, $fields, $filters);
        if (!$this->isGranted('ROLE_SUPER_ADMIN')) {
            $qb->add('where', $qb->expr()->in('entity.affaire', ':dep'));
            $qb->setParameter('dep', $depAffaire);
        }
        return $qb;
    }

}
