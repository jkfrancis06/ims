<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AffaireUtilisateurRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Validator as AppAssert;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\MaxDepth;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

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
 *              "access_control"="is_granted('USER_VIEW_AFF',object)",
 *           },
 *          "BULK-AFFAIRE_UTILISATEURS"={
 *              "method"="POST",
 *              "path"="/api/affaire_utilisateurs/bulk",
 *              "access_control"="is_granted('USER_VIEW_AFF')",
 *              "controller"="App\Controller\CreateBulkAffaireUtilisateursController",
 *              "denormalization_context"={
 *                 "groups"={"affaireUtilisateur:write"}
 *              },
 *              "normalization_context"={"groups"={"affaireUtilisateur:read"}},
 *          }
 *      },
 *      itemOperations={
 *          "get"= {
 *           },
 *          "delete"= {
 *              "access_control"="is_granted('USER_VIEW_AFF',object)",
 *           },
 *          "put"= {
 *              "access_control"="is_granted('USER_VIEW_AFF')",
 *           }
 *      },
 *     normalizationContext={"groups"={"affaireUtilisateur:read"}},
 *     denormalizationContext={"groups"={"affaireUtilisateur:write"}}
 * )
 * @ORM\Entity(repositoryClass=AffaireUtilisateurRepository::class)
 * @AppAssert\InDepartement()
 * @AppAssert\UtilisateurAffaireExist()
 * @ApiFilter(SearchFilter::class, properties={
 *     "affaire.id": "exact"
 * })
 */
class AffaireUtilisateur
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"affaireUtilisateur:read","affaire:read","utilisateur:read","canConsult:read"})
     */
    private $id;

    /**
     * @MaxDepth(1)
     * @ORM\ManyToOne(targetEntity=Utilisateur::class, inversedBy="affaireUtilisateurs")
     * @ORM\JoinColumn(name="utilisateur_id", nullable=false)
     * @Groups({"affaireUtilisateur:read","affaireUtilisateur:write","affaire:read","canConsult:read"})
     */
    private $utilisateur;

    /**
     * @ORM\ManyToOne(targetEntity=Affaire::class, inversedBy="affaireUtilisateurs")
     * @ORM\JoinColumn(name="affaire_id", nullable=false)
     * @Groups({"affaireUtilisateur:read","affaireUtilisateur:write","utilisateur:read","canConsult:read"})
     */
    private $affaire;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"affaireUtilisateur:read","affaire:read","utilisateur:read","canConsult:read"})
     */
    private $createdAt;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"affaireUtilisateur:read","affaireUtilisateur:write","affaire:read","utilisateur:read","canConsult:read"})
     */
    private $responsability;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Groups({"affaireUtilisateur:read","affaireUtilisateur:write","affaire:read","utilisateur:read","canConsult:read"})
     */
    private $niveauAccreditation;



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

    public function getNiveauAccreditation(): ?int
    {
        return $this->niveauAccreditation;
    }

    public function setNiveauAccreditation(int $niveauAccreditation): self
    {
        $this->niveauAccreditation = $niveauAccreditation;

        return $this;
    }
}
