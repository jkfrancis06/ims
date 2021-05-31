<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\VehiculeRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

/**
 * @ApiResource(
 *      collectionOperations={
 *          "get"= {
 *              "access_control"="is_granted('ROLE_USER')"
 *           },
 *          "post"= {
 *              "access_control"="is_granted('USER_VIEW_AFF', object)"
 *           },
 *      },
 *      itemOperations={
 *          "get"= {
 *              "access_control"="is_granted('USER_VIEW_AFF', object)"
 *           },
 *          "delete"= {
 *              "access_control"="is_granted('USER_VIEW_AFF', object)"
 *           },
 *          "put"= {
 *              "access_control"="is_granted('USER_VIEW_AFF', object)"
 *           }
 *      },
 *     normalizationContext={"groups"={"entite:read"}},
 *     denormalizationContext={"groups"={"entite:write"}}
 * )
 * @ApiFilter(SearchFilter::class,properties={"immatriculation":"iexact"})
 * @ORM\Entity(repositoryClass=VehiculeRepository::class)
 */
class Vehicule extends Entites
{

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"entite:read", "entite:write","vehicule:read","vehicule:write"})
     */
    protected $categorie;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"entite:read", "entite:write","vehicule:read","vehicule:write"})
     */
    protected $immatriculation;


    public function getImmatriculation(): ?string
    {
        return $this->immatriculation;
    }

    public function setImmatriculation(?string $immatriculation): self
    {
        $this->immatriculation = $immatriculation;

        return $this;
    }

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(string $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }
}
