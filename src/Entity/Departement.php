<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\DepartementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\MaxDepth;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;



/**
 *  @ApiResource(
 *      collectionOperations={
 *          "get"= {
 *               "access_control"="is_granted('ROLE_ADMIN')"
 *           },
 *           "GET-DEP-USERS"={
 *              "method"="GET",
 *              "path"="/departement-users/get",
 *              "access_control"="is_granted('ROLE_USER')",
 *              "controller"="App\Controller\GetDepartementUsersController",
 *              "denormalization_context"={
 *                 "groups"={"departement:write"}
 *              },
 *              "normalization_context"={"groups"={"departement:read"}},
 *          },
 *          "post"= {
 *               "access_control"="is_granted('ROLE_ADMIN')",
 *           }
 *      },
 *      itemOperations={
 *          "get"= {
 *               "access_control"="is_granted('USER_VIEW_DEP', object)"
 *           },
 *          "delete"= {
 *               "access_control"="is_granted('ROLE_ADMIN')",
 *           },
 *          "put"= {
 *               "access_control"="is_granted('ROLE_ADMIN')",
 *           }
 *      },
 *     normalizationContext={"groups"={"departement:read"}},
 *     denormalizationContext={"groups"={"departement:write"}}
 * )
 * @ORM\Entity(repositoryClass=DepartementRepository::class)
 * @UniqueEntity(fields={"nom"}, message="Ce departement existe deja !!")
 */
class Departement
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"envenement:read","utilisateur:read", "departement:read", "affaire:read","canConsult:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"envenement:read","utilisateur:read", "departement:read", "departement:write", "affaire:read","canConsult:read"})
     */
    private $nom;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"utilisateur:read", "departement:read", "departement:write", "affaire:read"})
     */
    private $description;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"utilisateur:read", "departement:read"})
     */
    private $ceatedAt;

    /**
     * @MaxDepth(1)
     * @ORM\OneToMany(targetEntity=Utilisateur::class, mappedBy="departement")
     * @Groups("departement:read","departement:write")
     */
    private $utilisateurs;

    /**
     * @MaxDepth(1)
     * @ORM\OneToMany(targetEntity=Affaire::class, mappedBy="departement")
     * @Groups("departement:read")
     */
    private $affaires;


    public function __construct()
    {
        $this->utilisateurs = new ArrayCollection();
        $this->ceatedAt = new \DateTime();
        $this->affaires = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCeatedAt(): ?\DateTimeInterface
    {
        return $this->ceatedAt;
    }

    public function setCeatedAt(\DateTimeInterface $ceatedAt): self
    {
        $this->ceatedAt = $ceatedAt;

        return $this;
    }

    /**
     * @return Collection|Utilisateur[]
     */
    public function getUtilisateurs(): Collection
    {
        return $this->utilisateurs;
    }

    public function addUtilisateur(Utilisateur $utilisateur): self
    {
        if (!$this->utilisateurs->contains($utilisateur)) {
            $this->utilisateurs[] = $utilisateur;
            $utilisateur->setDepartement($this);
        }

        return $this;
    }

    public function removeUtilisateur(Utilisateur $utilisateur): self
    {
        if ($this->utilisateurs->removeElement($utilisateur)) {
            // set the owning side to null (unless already changed)
            if ($utilisateur->getDepartement() === $this) {
                $utilisateur->setDepartement(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Affaire[]
     */
    public function getAffaires(): Collection
    {
        return $this->affaires;
    }

    public function addAffaire(Affaire $affaire): self
    {
        if (!$this->affaires->contains($affaire)) {
            $this->affaires[] = $affaire;
            $affaire->setDepartement($this);
        }

        return $this;
    }

    public function removeAffaire(Affaire $affaire): self
    {
        if ($this->affaires->removeElement($affaire)) {
            // set the owning side to null (unless already changed)
            if ($affaire->getDepartement() === $this) {
                $affaire->setDepartement(null);
            }
        }

        return $this;
    }

}
