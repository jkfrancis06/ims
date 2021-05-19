<?php

namespace App\Validator;

use App\Entity\CanConsult;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class CanConsultExistValidator extends ConstraintValidator
{

    private $entityManager;


    public function __construct(EntityManagerInterface $entityManager){
        $this->entityManager = $entityManager;
    }

    public function validate($canConsult, Constraint $constraint)
    {
        /* @var $constraint \App\Validator\CanConsultExist */

        if (null === $canConsult || '' === $canConsult) {
            return;
        }

        $exist = $this->entityManager->getRepository(CanConsult::class)->findBy([
            'affaire' => $canConsult->getAffaire(),
            'utilisateur' => $canConsult->getUtilisateur()
        ]);

        if ($exist != null) {
            $this->context->buildViolation($constraint->message)
                ->atPath('utilisateur')
                ->addViolation();
        }


    }
}
