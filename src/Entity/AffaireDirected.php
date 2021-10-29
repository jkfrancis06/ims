<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AffaireDirectedRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\OrderFilter;
use Symfony\Component\Serializer\Annotation\Groups;

/**
/**
 * @ApiResource(
 *      collectionOperations={
 *          "get"= {
 *               "access_control"="is_granted('ROLE_USER')"
 *           },
 *          "post"= {
 *              "access_control"="is_granted('USER_VIEW_AFF', object)",
 *           },
 *      },
 *      itemOperations={
 *          "get"= {
 *              "access_control"="is_granted('USER_VIEW_AFF', object)"
 *           },
 *          "delete"= {
 *               "access_control"="is_granted('USER_VIEW_AFF', object)",
 *           },
 *          "put"= {
 *              "access_control"="is_granted('USER_VIEW_AFF', object)"
 *           }
 *      },
 *     normalizationContext={"groups"={"affaireDirected:read"}},
 *     denormalizationContext={"groups"={"affaireDirected:write"}}
 * )
 * @ApiFilter(SearchFilter::class,properties={"affaire.id": "exact"})
 * @ORM\Entity(repositoryClass=AffaireDirectedRepository::class)
 */
class AffaireDirected
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"affaireDirected:read"})
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Affaire::class, inversedBy="affaireDirecteds")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"affaireDirected:read", "affaireDirected:write"})
     */
    private $affaire;

    /**
     * @ORM\ManyToOne(targetEntity=Utilisateur::class, inversedBy="affaireDirecteds")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"affaireDirected:read", "affaireDirected:write"})
     */
    private $utilisateur;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"affaireDirected:read", "affaireDirected:write"})
     */
    private $isRevoked;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"affaireDirected:read", "affaireDirected:write"})
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"affaireDirected:read", "affaireDirected:write"})
     */
    private $lastUpdate;


    public function __construct()
    {
        $this->isRevoked = false;
        $this->createdAt = new \DateTime();
        $this->lastUpdate = new \DateTime();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAffaire(): ?Affaire
    {
        return $this->affaire;
    }

    public function setAffaire(?Affaire $affaire): self
    {
        $this->affaire = $affaire;

        return $this;
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Utilisateur $utilisateur): self
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }


    public function getIsRevoked(): ?bool
    {
        return $this->isRevoked;
    }

    public function setIsRevoked(bool $isRevoked): self
    {
        $this->isRevoked = $isRevoked;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getLastUpdate(): ?\DateTimeInterface
    {
        return $this->lastUpdate;
    }

    public function setLastUpdate(\DateTimeInterface $lastUpdate): self
    {
        $this->lastUpdate = $lastUpdate;

        return $this;
    }
}
