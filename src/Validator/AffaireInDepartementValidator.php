<?php

namespace App\Validator;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class AffaireInDepartementValidator extends ConstraintValidator
{

    /** @var  TokenStorageInterface */
    private $tokenStorage;
    private $entityManager;


    public function __construct( TokenStorageInterface $storage ,EntityManagerInterface $entityManager){
        $this->tokenStorage = $storage;
        $this->entityManager = $entityManager;

    }



    public function validate($affaire, Constraint $constraint)
    {
        /* @var $constraint \App\Validator\AffaireInDepartement */

        $token = $this->tokenStorage->getToken();
        $user = $token->getUser();

        if ($token instanceof TokenInterface) {

            $departementAffaire = $affaire->getDepartement();
            $utilisateurDepartement = $user->getDepartement();

            if ($departementAffaire != $utilisateurDepartement){
                $this->context->buildViolation($constraint->message)
                    ->atPath('departement')
                    ->addViolation();
            }

        }


        if (null === $affaire || '' === $affaire) {
            return;
        }
;
    }
}
