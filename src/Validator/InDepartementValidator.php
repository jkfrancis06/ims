<?php

namespace App\Validator;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class InDepartementValidator extends ConstraintValidator
{

    private $entityManager;


    public function __construct(EntityManagerInterface $entityManager){
        $this->entityManager = $entityManager;
    }


    public function validate($affaireUtilisateur, Constraint $constraint)
    {
        /* @var $constraint \App\Validator\InDepartement */


        $affaire = $affaireUtilisateur->getAffaire();

        $departement = $affaire->getDepartement();

        $user_departement = $affaireUtilisateur->getUtilisateur()->getDepartement();
        if ($user_departement->getId() != $departement->getId()){
            $this->context->buildViolation($constraint->message)
                ->atPath('utilisateur')
                ->addViolation();
        }

        // TODO: implement the validation here




    }
}
