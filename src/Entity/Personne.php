<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PersonneRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
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
 *     normalizationContext={"groups"={"entite:read"}},
 *     denormalizationContext={"groups"={"entite:write"}}
 * )
 * @ORM\Entity(repositoryClass=PersonneRepository::class)
 */
class Personne extends Entites
{

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"entite:read", "entite:write"})
     */
    protected $nom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"entite:read", "entite:write"})
     */
    protected $prenom;

    /**
     * @ORM\Column(type="date", nullable=true)
     * @Groups({"entite:read", "entite:write"})
     */
    protected $dateNaissance;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"entite:read", "entite:write"})
     */
    protected $lieuNaissance;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"entite:read", "entite:write"})
     */
    protected $numPassport;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"entite:read", "entite:write"})
     */
    protected $numCarte;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"entite:read", "entite:write"})
     */
    protected $nationalite;

    public function __construct()
    {
        $this->description = $this->nom;
        $this->description2 = $this->prenom;
    }


    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(?\DateTimeInterface $dateNaissance): self
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    public function getLieuNaissance(): ?string
    {
        return $this->lieuNaissance;
    }

    public function setLieuNaissance(?string $lieuNaissance): self
    {
        $this->lieuNaissance = $lieuNaissance;

        return $this;
    }

    public function getNumPassport(): ?string
    {
        return $this->numPassport;
    }

    public function setNumPassport(?string $numPassport): self
    {
        $this->numPassport = $numPassport;

        return $this;
    }

    public function getNumCarte(): ?string
    {
        return $this->numCarte;
    }

    public function setNumCarte(?string $numCarte): self
    {
        $this->numCarte = $numCarte;

        return $this;
    }

    public function getNationalite(): ?string
    {
        return $this->nationalite;
    }

    public function setNationalite(string $nationalite): self
    {
        $this->nationalite = $nationalite;

        return $this;
    }

}
