<?php

namespace App\Entity;


use App\Repository\VehiculeRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

/**
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

    public function isVehicule(){
        return true;
    }
}
