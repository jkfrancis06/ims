<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\TacheRepository;
use Carbon\Carbon;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *      collectionOperations={
 *         "CREATED-TASK"={
 *              "method"="get",
 *              "path"="/utilisateur/task-created",
 *              "access_control"="is_granted('ROLE_USER')",
 *              "access_control_message"="Acces denied",
 *              "controller"="App\Controller\GetUserCreatedTasksController",
 *              "denormalization_context"={
 *                 "groups"={"get-created-task:write"}
 *              },
 *              "normalization_context"={"groups"={"get-created-task:read"}},
 *          },
 *
 *          "USER-TASK"={
 *              "method"="get",
 *              "path"="/utilisateur/tasks",
 *              "access_control"="is_granted('ROLE_USER')",
 *              "access_control_message"="Acces denied",
 *              "controller"="App\Controller\GetUserTasksController",
 *              "denormalization_context"={
 *                 "groups"={"get-task:write"}
 *              },
 *              "normalization_context"={"groups"={"get-task:read"}},
 *          },
 *
 *          "get"= {
 *               "access_control"="is_granted('ROLE_ADMIN')"
 *           },
 *          "post"= {
 *              "access_control"="is_granted('ROLE_USER')",
 *           },
 *      },
 *      itemOperations={
 *          "get"= {
 *              "access_control"="is_granted('USER_VIEW_AFF', object)"
 *           },
 *          "delete"= {
 *               "access_control"="is_granted('ROLE_ADMIN')",
 *           },
 *          "put"= {
 *              "access_control"="is_granted('USER_VIEW_AFF', object)"
 *           }
 *      },
 *     normalizationContext={"groups"={"tache:read"}},
 *     denormalizationContext={"groups"={"tache:write"}}
 * )
 * @ORM\Entity(repositoryClass=TacheRepository::class)
 */
class Tache
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"tache:read", "utilisateur:read", "tacheUtilisateur:read","get-created-task:read","get-created-task:write","get-task:read","get-task:write"})
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Affaire::class)
     * @Groups({"tache:read", "tache:write", "utilisateur:read", "tacheUtilisateur:read","get-created-task:read","get-created-task:write"})
     */
    private $affaire;

    /**
     * @ORM\ManyToOne(targetEntity=Utilisateur::class, inversedBy="taches")
     * @Groups({"tache:read", "tache:write", "utilisateur:read", "tacheUtilisateur:read","get-created-task:read","get-created-task:write"})
     */
    private $createdBy;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"tache:read", "tache:write", "utilisateur:read", "tacheUtilisateur:read","get-created-task:read","get-created-task:write","get-task:read","get-task:write"})
     */
    private $priorite;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"tache:read", "tache:write", "utilisateur:read", "tacheUtilisateur:read","get-created-task:read","get-created-task:write","get-task:read","get-task:write"})
     */
    private $createdAt;


    /**
     * @ORM\Column(type="datetime")
     * @Groups({"tache:read", "tache:write", "utilisateur:read", "tacheUtilisateur:read","get-created-task:read","get-created-task:write","get-task:read","get-task:write"})
     */
    private $lastUpdate;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Groups({"tache:read", "tache:write", "utilisateur:read", "tacheUtilisateur:read","get-created-task:read","get-created-task:write","get-task:read","get-task:write"})
     */
    private $expireAt;


    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"tache:read", "tache:write", "utilisateur:read", "tacheUtilisateur:read","get-created-task:read","get-created-task:write","get-task:read","get-task:write"})
     */
    private $titre;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"tache:read", "tache:write", "utilisateur:read", "tacheUtilisateur:read","get-created-task:read","get-created-task:write","get-task:read","get-task:write"})
     */
    private $resume;

    /**
     * @ORM\OneToMany(targetEntity=TacheUtilisateur::class, mappedBy="tache")
     * @Groups({"tache:read", "tache:write", "utilisateur:read","get-created-task:read","get-created-task:write"})
     */
    private $tacheUtilisateurs;



    public function __construct()
    {
        $this->tacheUtilisateurs = new ArrayCollection();
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

    public function getCreatedBy(): ?Utilisateur
    {
        return $this->createdBy;
    }

    public function setCreatedBy(?Utilisateur $createdBy): self
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    public function getPriorite(): ?int
    {
        return $this->priorite;
    }

    public function setPriorite(int $priorite): self
    {
        $this->priorite = $priorite;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    /**
     * @Groups({"tache:read", "utilisateur:read", "tacheUtilisateur:read","get-created-task:read","get-task:read"})
     */
    public function getCreatedAtTimeStamp(): string
    {
        return $this->createdAt->getTimestamp()*1000;
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

    /**
     * @Groups({"tache:read", "utilisateur:read", "tacheUtilisateur:read","get-created-task:read","get-task:read"})
     */
    public function getExpiresAtTimeStamp(): string
    {
        return $this->expireAt->getTimestamp()*1000;
    }

    public function setExpireAt(?\DateTimeInterface $expireAt): self
    {
        $this->expireAt = $expireAt;

        return $this;
    }

    /**
     * @Groups({"tache:read", "utilisateur:read", "tacheUtilisateur:read","get-created-task:read","get-task:read"})
     */
    public function getExpiresIn(): string
    {
        Carbon::setLocale('fr');
        return Carbon::instance($this->getExpireAt())->diffForHumans();
    }



    public function getResume(): ?string
    {
        return $this->resume;
    }

    public function setResume(?string $resume): self
    {
        $this->resume = $resume;

        return $this;
    }

    /**
     * @return Collection|TacheUtilisateur[]
     */
    public function getTacheUtilisateurs(): Collection
    {
        return $this->tacheUtilisateurs;
    }

    public function addTacheUtilisateur(TacheUtilisateur $tacheUtilisateur): self
    {
        if (!$this->tacheUtilisateurs->contains($tacheUtilisateur)) {
            $this->tacheUtilisateurs[] = $tacheUtilisateur;
            $tacheUtilisateur->setTache($this);
        }

        return $this;
    }

    public function removeTacheUtilisateur(TacheUtilisateur $tacheUtilisateur): self
    {
        if ($this->tacheUtilisateurs->removeElement($tacheUtilisateur)) {
            // set the owning side to null (unless already changed)
            if ($tacheUtilisateur->getTache() === $this) {
                $tacheUtilisateur->setTache(null);
            }
        }

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

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(?string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }
}
