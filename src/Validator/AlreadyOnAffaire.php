<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class AlreadyOnAffaire extends Constraint
{
    /*
     * Any public properties become valid options for the annotation.
     * Then, use these in your validator class.
     */
    public $message = "L'utilisateur est deja sur cette affaire";

    public function getTargets()
    {
        return self::CLASS_CONSTRAINT;
    }

}
