<?php

namespace App\Controller\Admin;

use App\Entity\Affaire;
use App\Entity\CanConsult;
use App\Entity\Utilisateur;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CanConsultCrudController extends AbstractCrudController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager) {
        $this->entityManager = $entityManager;
    }


    public static function getEntityFqcn(): string
    {
        return CanConsult::class;
    }


    public function configureFields(string $pageName): iterable
    {

        $users = $this->entityManager->getRepository(Utilisateur::class)->findAll();


        $req = $this->entityManager->getRepository(Affaire::class)->findBy([
                'departement' => $this->getUser()->getDepartement()
            ]
        );

        if (in_array('ROLE_SUPER_ADMIN',$this->getUser()->getRoles())){
            $req = $this->entityManager->getRepository(Affaire::class)->findAll();
        }

        return [
            IdField::new('id')->setFormTypeOption('disabled','disabled'),
            AssociationField::new('affaire')->setFormTypeOptions(["choices" => $req]),
            AssociationField::new('utilisateur')->setFormTypeOptions(["choices" => $users]),
            DateTimeField::new('expireAt'),
            BooleanField::new('isRevoked')->hideOnForm()
        ];
    }

    public function createEntity(string $entityFqcn)
    {
        $consult = new CanConsult();
        $consult->setCreatedBy($this->getUser());

        return $consult;
    }
}
