<?php

namespace App\Entity;

use App\Repository\OrganisationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OrganisationRepository::class)
 */
class Organisation extends Entites
{

    public function isOrganisation(){
        return true;
    }

}
