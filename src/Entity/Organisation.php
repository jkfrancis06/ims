<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\OrganisationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OrganisationRepository::class)
 * @ApiResource(
 *      collectionOperations={
 *          "get"= {
 *              "access_control"="is_granted('USER_VIEW_AFF', object)"
 *           },
 *          "post"= {
 *              "access_control"="is_granted('USER_OWN_AFF', object)"
 *           },
 *      },
 *      itemOperations={
 *          "get"= {
 *              "access_control"="is_granted('USER_VIEW_AFF', object)"
 *           },
 *          "delete"= {
 *              "access_control"="is_granted('USER_OWN_AFF', object)"
 *           },
 *          "put"= {
 *              "access_control"="is_granted('USER_OWN_AFF', object)"
 *           }
 *      },
 *     normalizationContext={"groups"={"organisation:read"}},
 *     denormalizationContext={"groups"={"organisation:write"}}
 * )
 */
class Organisation extends Entites
{
    
}
