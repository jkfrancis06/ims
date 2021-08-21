<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class Password extends Constraint
{
    /*
     * Any public properties become valid options for the annotation.
     * Then, use these in your validator class.
     */
    public $message = 'Le mot de passe saisi est incorrect';

    public function getTargets()
    {
        return self::CLASS_CONSTRAINT;
    }

}
