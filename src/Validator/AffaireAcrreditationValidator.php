<?php

namespace App\Validator;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class AffaireAcrreditationValidator extends ConstraintValidator
{
    /** @var  TokenStorageInterface */
    private $tokenStorage;
    private $entityManager;


    public function __construct( TokenStorageInterface $storage ,EntityManagerInterface $entityManager){
        $this->tokenStorage = $storage;
        $this->entityManager = $entityManager;

    }


    public function validate($value, Constraint $constraint)
    {
        /* @var $constraint \App\Validator\AffaireAcrreditation */

        if (null === $value || '' === $value) {
            return;
        }

        $token = $this->tokenStorage->getToken();
        $user = $token->getUser();

        if ($token instanceof TokenInterface) {
            if ($value->getNiveauAccreditation() > $user->getNiveauAccreditation()){
                $this->context->buildViolation($constraint->message)
                    ->atPath('niveauAccreditation')
                    ->addViolation();
            }
        }

    }
}
