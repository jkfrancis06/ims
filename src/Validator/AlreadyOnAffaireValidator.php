<?php

namespace App\Validator;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class AlreadyOnAffaireValidator extends ConstraintValidator
{

    /** @var  TokenStorageInterface */
    private $tokenStorage;
    private $entityManager;


    public function __construct( TokenStorageInterface $storage ,EntityManagerInterface $entityManager){
        $this->tokenStorage = $storage;
        $this->entityManager = $entityManager;

    }

    public function validate($canConsult, Constraint $constraint)
    {
        /* @var $constraint \App\Validator\AffaireInDepartement */

        $token = $this->tokenStorage->getToken();
        $user = $token->getUser();

        if ($token instanceof TokenInterface) {

            $consultAffaire = $canConsult->getAffaire();
            $utilisateurAffaires = $canConsult->getUtilisateur()->getAffaireUtilisateurs();
            if ($utilisateurAffaires != null) {
                foreach ($utilisateurAffaires as $utilisateurAffaire){
                    if ($utilisateurAffaire->getAffaire() == $consultAffaire){
                        $this->context->buildViolation($constraint->message)
                            ->atPath('affaire')
                            ->addViolation();
                        break;
                    }
                }
            }
        }

        if (null === $canConsult || '' === $canConsult) {
            return;
        }
    }
}
