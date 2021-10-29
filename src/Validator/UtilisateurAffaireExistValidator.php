<?php

namespace App\Validator;

use App\Entity\AffaireUtilisateur;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class UtilisateurAffaireExistValidator extends ConstraintValidator
{

    private $entityManager;


    public function __construct(EntityManagerInterface $entityManager){
        $this->entityManager = $entityManager;
    }

    public function validate($affaireUtilisateur, Constraint $constraint)
    {
        /* @var $constraint \App\Validator\UtilisateurAffaireExist */

        if (null === $affaireUtilisateur || '' === $affaireUtilisateur) {
            return;
        }

        $exist = $this->entityManager->getRepository(AffaireUtilisateur::class)->findBy([
            'affaire' => $affaireUtilisateur->getAffaire(),
            'utilisateur' => $affaireUtilisateur->getUtilisateur()
        ]);

        if ($exist != null) {
            $this->context->buildViolation($constraint->message)
                ->atPath('utilisateur')
                ->addViolation();
        }

    }
}
