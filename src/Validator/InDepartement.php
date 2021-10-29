<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class InDepartement extends Constraint
{
    /*
     * Any public properties become valid options for the annotation.
     * Then, use these in your validator class.
     */
    public $message = 'L\'utilisateur n\'appartient pas au departement assigné à l\'affaire';

    public function getTargets()
    {
        return self::CLASS_CONSTRAINT;
    }
}
