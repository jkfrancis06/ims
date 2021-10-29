<?php

namespace App\Validator;

use App\Entity\Utilisateur;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class UtilisateurRoleValidator extends ConstraintValidator
{

    /** @var  TokenStorageInterface */
    private $tokenStorage;
    private $entityManager;
    private $requestStack;



    public function __construct( TokenStorageInterface $storage ,EntityManagerInterface $entityManager,RequestStack $requestStack){
        $this->tokenStorage = $storage;
        $this->entityManager = $entityManager;
        $this->requestStack = $requestStack;


    }

    /*
     *
     * Un utilisateur non super admin ne doit pas creer de role ADMIN et superieur
     * Un utilisateur non super admin ne doit pas creer de niveau d'accreditation inferieur au sien
     */

    public function validate($value, Constraint $constraint)
    {
        /* @var $constraint \App\Validator\UtilisateurRole */

        if (null === $value || '' === $value) {
            return;
        }

        $token = $this->tokenStorage->getToken();
        $user = $token->getUser();

        $db_user = $this->entityManager->getRepository(Utilisateur::class)->findOneBy([
            'id' => $value->getId()
        ]);

        $new_roles = [];
        if ($db_user != null){  // c'est une modification
            foreach ($value->getRoles() as $role){
                if (!in_array($role,$db_user->getRoles())){ // c'est un nouveau role
                    array_push($new_roles,$role);
                }
            }
        }else{
            $new_roles =  $value->getRoles();
        }



        var_dump($new_roles);

        if (!in_array('ROLE_SUPER_ADMIN',$user->getRoles())){  // s'il n'est pas superadmin

            if ($user->getNiveauAccreditation() < $value->getNiveauAccreditation()){
                $this->context->buildViolation($constraint->message)
                    ->setParameter('{{ value }}', '')
                    ->addViolation();
            }

            if (in_array('ROLE_ADMIN',$new_roles) || in_array('ROLE_SUPER_ADMIN',$new_roles)){
                if ($user->getNiveauAccreditation() < $value->getNiveauAccreditation()){
                    $this->context->buildViolation($constraint->message)
                        ->setParameter('{{ value }}', '')
                        ->addViolation();
                }
            }

        }

    }
}
