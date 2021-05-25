<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class OnTache extends Constraint
{
    /*
     * Any public properties become valid options for the annotation.
     * Then, use these in your validator class.
     */
    public $message = 'Cet utilisateur est deja affecté a cette tache';

    public function getTargets()
    {
        return self::CLASS_CONSTRAINT;
    }
}
