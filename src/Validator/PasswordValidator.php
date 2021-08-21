<?php

namespace App\Validator;

use App\Entity\Utilisateur;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class PasswordValidator extends ConstraintValidator
{

    private $passwordEncoder;
    private $validator;



    public function __construct(ValidatorInterface $validator,UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
        $this->validator = $validator;


    }


    public function validate($value, Constraint $constraint)
    {



        /* @var $constraint \App\Validator\Password */

        if (null === $value || '' === $value) {
            return;
        }

        $violations = $this->validator->validate($value, null, 'change-pass');




        $password = $this->passwordEncoder->encodePassword($value, $value->getPlainPassword());

        foreach ($violations as $violation) {
            // TODO: implement the validation here
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ value }}', '')
                ->addViolation();
        }

        if ($password != $value->getPassword()){

        }


    }
}
