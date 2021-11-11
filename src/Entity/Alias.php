<?php

namespace App\Entity;

use App\Repository\AliasRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=AliasRepository::class)
 */
class Alias
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"alias:read", "entite:read","entite:write"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"alias:read", "entite:read","entite:write"})
     */
    private $alias;

    /**
     * @ORM\ManyToOne(targetEntity=Personne::class, inversedBy="aliases")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"alias:read","entite:write"})
     */
    private $personne;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAlias(): ?string
    {
        return $this->alias;
    }

    public function setAlias(string $alias): self
    {
        $this->alias = $alias;

        return $this;
    }

    public function getPersonne(): ?Personne
    {
        return $this->personne;
    }

    public function setPersonne(?Personne $personne): self
    {
        $this->personne = $personne;

        return $this;
    }
}
