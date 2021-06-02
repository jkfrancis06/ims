<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CanConsultRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Validator as AppAssert;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\MaxDepth;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

/**
 * @ORM\Table(
 *    name="utilisateur_consultation",
 *    uniqueConstraints={
 *        @ORM\UniqueConstraint(name="utilisateur_consultation_unique", columns={"affaire_id", "utilisateur_id"})
 *    }
 * )
 * @ApiResource(
 *      collectionOperations={
 *          "get"= {
 *              "access_control"="is_granted('ROLE_USER')"
 *           },
 *          "post"= {
 *              "access_control"="is_granted('USER_VIEW_AFF',object)"
 *           }
 *      },
 *      itemOperations={
 *          "get"= {
 *             "access_control"="is_granted('USER_VIEW_AFF',object)"
 *           },
 *          "delete"= {
 *              "access_control"="is_granted('USER_VIEW_AFF',object)"
 *           },
 *          "put"= {
 *              "access_control"="is_granted('USER_VIEW_AFF',object)"
 *           }
 *      },
 *     normalizationContext={"groups"={"canConsult:read"}},
 *     denormalizationContext={"groups"={"canConsult:write"}}
 * )
 * @ApiFilter(SearchFilter::class,properties={"utilisateur.id": "exact"})
 * @ORM\Entity(repositoryClass=CanConsultRepository::class)
 * @AppAssert\AlreadyOnAffaire()
 */
class CanConsult
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"canConsult:read","affaire:read"})
     */
    private $id;

    /**
     * @MaxDepth(1)
     * @ORM\ManyToOne(targetEntity=Affaire::class, inversedBy="canConsults")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"canConsult:read","canConsult:write","affaire:read"})
     */
    private $affaire;

    /**
     * @MaxDepth(1)
     * @ORM\ManyToOne(targetEntity=Utilisateur::class, inversedBy="canConsults")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"canConsult:read","canConsult:write","affaire:read"})
     */
    private $utilisateur;

    /**
     * @MaxDepth(1)
     * @ORM\ManyToOne(targetEntity=Utilisateur::class, inversedBy="canConsultsCreated")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"canConsult:read","canConsult:write","affaire:read"})
     */
    private $createdBy;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"canConsult:read","canConsult:write","affaire:read"})
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"canConsult:read","canConsult:write","affaire:read"})
     */
    private $expireAt;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"canConsult:read","canConsult:write","affaire:read"})
     */
    private $isRevoked;


    /**
     * @ORM\Column(type="string", nullable=true)
     * @Groups({"canConsult:read","canConsult:write","affaire:read"})
     */
    private $statut;

    public function __construct(){
        $this->createdAt = new \DateTime();
        $this->isRevoked = false;
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

    public function getCreatedBy(): ?Utilisateur
    {
        return $this->createdBy;
    }

    public function setCreatedBy(?Utilisateur $createdBy): self
    {
        $this->createdBy = $createdBy;

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

    public function getExpireAt(): ?\DateTimeInterface
    {
        return $this->expireAt;
    }

    public function setExpireAt(\DateTimeInterface $expireAt): self
    {
        $this->expireAt = $expireAt;

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

    public function getStatut(): ?string
    {
        if(!$this->isRevoked){
            if ($this->expireAt > new \DateTime()){
                return "0";
            }else{
                return "1";
            }
        }else{
            return "3";
        }
    }

    public function setStatut(?string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

}
