<?php

namespace App\Controller\Admin;

use App\Entity\Affaire;
use App\Entity\Departement;
use App\Entity\DepartementDirector;
use App\Entity\Utilisateur;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\QueryBuilder;
use EasyCorp\Bundle\EasyAdminBundle\Collection\FieldCollection;
use EasyCorp\Bundle\EasyAdminBundle\Collection\FilterCollection;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Dto\EntityDto;
use EasyCorp\Bundle\EasyAdminBundle\Dto\SearchDto;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

use EasyCorp\Bundle\EasyAdminBundle\Config\KeyValueStore;

class UtilisateurCrudController extends AbstractCrudController
{

    private $passwordEncoder;
    private $entityManager;


    public function __construct(EntityManagerInterface $entityManager,UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
        $this->entityManager = $entityManager;

    }

    public static function getEntityFqcn(): string
    {
        return Utilisateur::class;
    }

    public function configureActions(Actions $actions): Actions
    {

        return $actions
            ->add(Crud::PAGE_INDEX, Action::DETAIL)
            ->remove(Crud::PAGE_INDEX, Action::DELETE)
            ->remove(Crud::PAGE_DETAIL, Action::DELETE)
            ->setPermission(Action::EDIT, 'ROLE_USER')
            ;
    }


    public function configureFields(string $pageName): iterable
    {
        /*
         *
         * Un role_admin ne peut ajouter des utilisateurs appartenant qu'a son departement
         *
         */
        if (in_array('ROLE_SUPER_ADMIN',$this->getUser()->getRoles())){
            $dep = $this->entityManager->getRepository(Departement::class)->findAll();
        }else{
            $dep = new ArrayCollection();
            $dep->add($this->getUser()->getDepartement());
        }

        if ($pageName == Crud::PAGE_EDIT){

        }

        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('nom'),
            TextField::new('prenom'),
            NumberField::new('niveauAccreditation'),
            TextField::new('numeroMatricule')->hideOnForm(),
            TextField::new('username'),
            TextField::new('plainPassword')->onlyOnForms()->setFormType(RepeatedType::class) ->setFormTypeOptions([
                'type' => PasswordType::class,
                'first_options' => ['label' => 'Mot de passe:'],
                'second_options' => ['label' => 'Confirmer mot de passe:'],
                'first_name' => 'first_password',
                'second_name' => 'second_password',
            ])
                ->setRequired($pageName == Crud::PAGE_NEW),
            BooleanField::new('isActive'),
            BooleanField::new('isDeleted'),
            ArrayField::new('roles'),
            AssociationField::new('departement')->setFormTypeOptions(["choices" => $dep]),
        ];
    }



    public function createNewFormBuilder(EntityDto $entityDto, KeyValueStore $formOptions, AdminContext $context): FormBuilderInterface
    {
        $formBuilder = parent::createNewFormBuilder($entityDto, $formOptions, $context);

        $this->addEncodePasswordEventListener($formBuilder);

        return $formBuilder;
    }

    /**
     * @required
     */
    public function setEncoder(UserPasswordEncoderInterface $passwordEncoder): void
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    protected function addEncodePasswordEventListener(FormBuilderInterface $formBuilder)
    {
        $formBuilder->addEventListener(FormEvents::SUBMIT, function (FormEvent $event) {
            /** @var Utilisateur $user */
            $user = $event->getData();
            if ($user->getPlainPassword()) {
                $user->setPassword($this->passwordEncoder->encodePassword($user, $user->getPlainPassword()));
            }
        });
    }

    public function createEntity(string $entityFqcn)
    {
        $utilisateur = new Utilisateur();
        $utilisateur->setIsDeleted(false);
        return $utilisateur;
    }


    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        $this->encodePassword($entityInstance);
        parent::persistEntity($entityManager, $entityInstance);
    }

    public function updateEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        $this->encodePassword($entityInstance);
        parent::updateEntity($entityManager, $entityInstance);
    }

    private function encodePassword(Utilisateur $user)
    {

        if ($user->getPlainPassword() !== null) {
            $user->setSalt(base_convert(bin2hex(random_bytes(20)), 16, 36));
            // This is where you use UserPasswordEncoderInterface
            $user->setPassword($this->passwordEncoder->encodePassword($user, $user->getPlainPassword()));
        }

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
