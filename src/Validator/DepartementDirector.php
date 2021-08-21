<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class DepartementDirector extends Constraint
{
    /*
     * Any public properties become valid options for the annotation.
     * Then, use these in your validator class.
     */
    public $message = 'L\'utilisateur n\'appartient pas au departement';


    public function getTargets()
    {
        return self::CLASS_CONSTRAINT;
    }
}
