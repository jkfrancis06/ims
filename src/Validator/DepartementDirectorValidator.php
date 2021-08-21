<?php

namespace App\Validator;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class DepartementDirectorValidator extends ConstraintValidator
{

    private $entityManager;


    public function __construct(EntityManagerInterface $entityManager){
        $this->entityManager = $entityManager;
    }

    public function validate($value, Constraint $constraint)
    {
        /* @var $constraint \App\Validator\DepartementDirector */

        if ($value->getUtilisateur()->getDepartement() != $value->getDepartement()) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ value }}', '')
                ->addViolation();
        }
    }


}
