<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class CanConsultExist extends Constraint
{
    /*
     * Any public properties become valid options for the annotation.
     * Then, use these in your validator class.
     */
    public $message = 'Cet utilisateur est deja consultant sur cette affaire';

    public function getTargets()
    {
        return self::CLASS_CONSTRAINT;
    }
}
