<?php

namespace App\Entity;

use App\Repository\TacheUtilisateurRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=TacheUtilisateurRepository::class)
 */
class TacheUtilisateur
{


    const STATUS_PENDING = 0;
    const STATUS_ACCPETED = 1;
    const STATUS_REJECTED = 2;


    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"tache:read", "utilisateur:read","get-task:read"})
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Tache::class, inversedBy="tacheUtilisateurs")
     * @Groups({"tache:read","utilisateur:read", "tacheUtilisateur:read","get-task:read"})
     */
    private $tache;

    /**
     * @ORM\ManyToOne(targetEntity=Utilisateur::class, inversedBy="tacheUtilisateurs")
     * @Groups({"tache:read","utilisateur:read", "tacheUtilisateur:read", "tacheUtilisateur:write","get-task:read"})
     */
    private $utilisateur;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"tache:read","utilisateur:read", "tacheUtilisateur:read", "tacheUtilisateur:write","get-task:read"})
     */
    private $statut;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"tache:read","utilisateur:read", "tacheUtilisateur:read", "tacheUtilisateur:write","get-task:read"})
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"tache:read","utilisateur:read", "tacheUtilisateur:read", "tacheUtilisateur:write","get-task:read"})
     */
    private $remarque;




    public function __construct(){
        $this->updatedAt = new \DateTime();
        $this->statut = 0;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTache(): ?Tache
    {
        return $this->tache;
    }

    public function setTache(?Tache $tache): self
    {
        $this->tache = $tache;

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

    public function getStatut(): ?int
    {
        return $this->statut;
    }

    public function setStatut(int $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getRemarque(): ?string
    {
        return $this->remarque;
    }

    public function setRemarque(?string $remarque): self
    {
        $this->remarque = $remarque;

        return $this;
    }
}
