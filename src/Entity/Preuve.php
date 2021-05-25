<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PreuveRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *      collectionOperations={
 *          "get"= {
 *               "access_control"="is_granted('USER_VIEW_AFF', object))"
 *           },
 *          "post"= {
 *              "access_control"="is_granted('USER_VIEW_AFF', object))",
 *           },
 *      },
 *      itemOperations={
 *          "get"= {
 *              "access_control"="is_granted('USER_VIEW_AFF', object)"
 *           },
 *          "delete"= {
 *               "access_control"="is_granted('USER_VIEW_AFF', object))",
 *           },
 *          "put"= {
 *              "access_control"="is_granted('USER_VIEW_AFF', object)"
 *           }
 *      },
 *     normalizationContext={"groups"={"preuve:read"}},
 *     denormalizationContext={"groups"={"preuve:write"}}
 * )
 * @ORM\Entity(repositoryClass=PreuveRepository::class)
 */
class Preuve
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"preuve:read","envenement:read", "envenement:read","affaire:read", "entite:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"preuve:read","preuve:write","envenement:read", "envenement:read","affaire:read", "entite:read"})
     */
    private $nom;

    /**
     * @ORM\Column(type="text")
     * @Groups({"preuve:read","preuve:write","envenement:read", "envenement:read","affaire:read", "entite:read"})
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity=Envenement::class, inversedBy="preuves")
     * @Groups({"preuve:read","preuve:write","affaire:read", "entite:read"})
     */
    private $evenement;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"preuve:read","preuve:write","envenement:read", "envenement:read","affaire:read", "entite:read"})
     */
    private $createdAt;

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

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getEvenement(): ?Envenement
    {
        return $this->evenement;
    }

    public function setEvenement(?Envenement $evenement): self
    {
        $this->evenement = $evenement;

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
}
