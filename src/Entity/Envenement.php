<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\EnvenementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=EnvenementRepository::class)
 */
class Envenement
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $typeEvenement;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $localisation;

    /**
     * @ORM\Column(type="datetime")
     */
    private $startAt;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $duration;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $resume;

    /**
     * @ORM\ManyToMany(targetEntity=Entites::class, inversedBy="envenements")
     */
    private $entite;

    /**
     * @ORM\ManyToMany(targetEntity=Utilisateur::class)
     */
    private $utilisateur;

    /**
     * @ORM\OneToMany(targetEntity=Preuve::class, mappedBy="evenement")
     */
    private $preuves;

    public function __construct()
    {
        $this->entite = new ArrayCollection();
        $this->utilisateur = new ArrayCollection();
        $this->preuves = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeEvenement(): ?string
    {
        return $this->typeEvenement;
    }

    public function setTypeEvenement(string $typeEvenement): self
    {
        $this->typeEvenement = $typeEvenement;

        return $this;
    }

    public function getLocalisation(): ?string
    {
        return $this->localisation;
    }

    public function setLocalisation(string $localisation): self
    {
        $this->localisation = $localisation;

        return $this;
    }

    public function getStartAt(): ?\DateTimeInterface
    {
        return $this->startAt;
    }

    public function setStartAt(\DateTimeInterface $startAt): self
    {
        $this->startAt = $startAt;

        return $this;
    }

    public function getDuration(): ?string
    {
        return $this->duration;
    }

    public function setDuration(string $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getResume(): ?string
    {
        return $this->resume;
    }

    public function setResume(string $resume): self
    {
        $this->resume = $resume;

        return $this;
    }

    /**
     * @return Collection|Entites[]
     */
    public function getEntite(): Collection
    {
        return $this->entite;
    }

    public function addEntite(Entites $entite): self
    {
        if (!$this->entite->contains($entite)) {
            $this->entite[] = $entite;
        }

        return $this;
    }

    public function removeEntite(Entites $entite): self
    {
        $this->entite->removeElement($entite);

        return $this;
    }

    /**
     * @return Collection|Utilisateur[]
     */
    public function getUtilisateur(): Collection
    {
        return $this->utilisateur;
    }

    public function addUtilisateur(Utilisateur $utilisateur): self
    {
        if (!$this->utilisateur->contains($utilisateur)) {
            $this->utilisateur[] = $utilisateur;
        }

        return $this;
    }

    public function removeUtilisateur(Utilisateur $utilisateur): self
    {
        $this->utilisateur->removeElement($utilisateur);

        return $this;
    }

    /**
     * @return Collection|Preuve[]
     */
    public function getPreuves(): Collection
    {
        return $this->preuves;
    }

    public function addPreufe(Preuve $preufe): self
    {
        if (!$this->preuves->contains($preufe)) {
            $this->preuves[] = $preufe;
            $preufe->setEvenement($this);
        }

        return $this;
    }

    public function removePreufe(Preuve $preufe): self
    {
        if ($this->preuves->removeElement($preufe)) {
            // set the owning side to null (unless already changed)
            if ($preufe->getEvenement() === $this) {
                $preufe->setEvenement(null);
            }
        }

        return $this;
    }
}
