<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AffaireUtilisateurRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Validator as AppAssert;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\MaxDepth;

/**
 * @ORM\Table(
 *    name="affaire_utilisateur",
 *    uniqueConstraints={
 *        @ORM\UniqueConstraint(name="assignment_unique", columns={"affaire_id", "utilisateur_id"})
 *    }
 * )
 * @ApiResource(
 *      collectionOperations={
 *          "get"= {
 *           },
 *          "post"= {
 *              "access_control"="is_granted('ROLE_CREATOR')"
 *           }
 *      },
 *      itemOperations={
 *          "get"= {
 *           },
 *          "delete"= {
 *              "access_control"="is_granted('ROLE_ADMIN')",
 *           },
 *          "put"= {
 *              "access_control"="is_granted('ROLE_ADMIN')",
 *           }
 *      },
 *     normalizationContext={"groups"={"affaireUtilisateur:read"}},
 *     denormalizationContext={"groups"={"affaireUtilisateur:write"}}
 * )
 * @ORM\Entity(repositoryClass=AffaireUtilisateurRepository::class)
 * @AppAssert\InDepartement()
 * @AppAssert\UtilisateurAffaireExist()
 */
class AffaireUtilisateur
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"affaireUtilisateur:read","affaire:read","utilisateur:read"})
     */
    private $id;

    /**
     * @MaxDepth(1)
     * @ORM\ManyToOne(targetEntity=Utilisateur::class, inversedBy="affaireUtilisateurs")
     * @ORM\JoinColumn(name="utilisateur_id", nullable=false)
     * @Groups({"affaireUtilisateur:read","affaireUtilisateur:write","affaire:read"})
     */
    private $utilisateur;

    /**
     * @ORM\ManyToOne(targetEntity=Affaire::class, inversedBy="affaireUtilisateurs")
     * @ORM\JoinColumn(name="affaire_id", nullable=false)
     * @Groups({"affaireUtilisateur:read","affaireUtilisateur:write","utilisateur:read"})
     */
    private $affaire;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"affaireUtilisateur:read","affaire:read","utilisateur:read"})
     */
    private $createdAt;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"affaireUtilisateur:read","affaireUtilisateur:write","affaire:read","utilisateur:read"})
     */
    private $responsability;

    public function __construct(){
        $this->createdAt = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getAffaire(): ?Affaire
    {
        return $this->affaire;
    }

    public function setAffaire(?Affaire $affaire): self
    {
        $this->affaire = $affaire;

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

    public function getResponsability(): ?string
    {
        return $this->responsability;
    }

    public function setResponsability(?string $responsability): self
    {
        $this->responsability = $responsability;

        return $this;
    }
}
