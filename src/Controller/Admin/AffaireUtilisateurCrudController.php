<?php

namespace App\Controller\Admin;

use App\Entity\Affaire;
use App\Entity\AffaireDirected;
use App\Entity\AffaireUtilisateur;
use App\Entity\Utilisateur;
use App\Repository\UtilisateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\QueryBuilder;
use EasyCorp\Bundle\EasyAdminBundle\Collection\FieldCollection;
use EasyCorp\Bundle\EasyAdminBundle\Collection\FilterCollection;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Dto\EntityDto;
use EasyCorp\Bundle\EasyAdminBundle\Dto\SearchDto;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;

class AffaireUtilisateurCrudController extends AbstractCrudController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager) {
        $this->entityManager = $entityManager;
    }

    public static function getEntityFqcn(): string
    {
        return AffaireUtilisateur::class;
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
            IdField::new('id')
                ->setFormTypeOption('disabled','disabled'),

            AssociationField::new('utilisateur')->setFormTypeOptions(["choices" => $users]),
            AssociationField::new('affaire')->setFormTypeOptions(["choices" => $req]),
            BooleanField::new('isRevoked'),
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
