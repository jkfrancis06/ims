<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class AffaireAcrreditation extends Constraint
{
    /*
     * Any public properties become valid options for the annotation.
     * Then, use these in your validator class.
     */
    public $message = "le niveau d'accreditation ne doit pas etre superieur au votre";

    public function getTargets()
    {
        return self::CLASS_CONSTRAINT;
    }
}
