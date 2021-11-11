<?php

namespace App\Entity;

use App\Repository\EnvenementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;


/**
 * @ORM\Entity(repositoryClass=EnvenementRepository::class)
 */
class Envenement
{
    const EVENT_PER = 0;
    const EVENT_AUD = 1;
    const EVENT_FIL = 2;
    const EVENT_OTHER = 3;
    const EVENT_INFIL = 4;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"envenement:read", "envenement:read","affaire:read", "entite:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="integer", length=255)
     * @Groups({"envenement:read", "envenement:write","affaire:read", "entite:read"})
     */
    private $typeEvenement;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"envenement:read", "envenement:write","affaire:read", "entite:read"})
     */
    private $localisation;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Groups({"envenement:read", "envenement:write","affaire:read", "entite:read"})
     */
    private $startAt;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"envenement:read", "envenement:write","affaire:read", "entite:read"})
     */
    private $duration;


    /**
     * @ORM\Column(type="text")
     * @Groups({"envenement:read", "envenement:write","affaire:read", "entite:read"})
     */
    private $resume;

    /**
     * @ORM\ManyToMany(targetEntity=Entites::class, inversedBy="envenements")
     * @Groups({"envenement:read", "envenement:write","affaire:read"})
     */
    private $entite;

    /**
     * @ORM\ManyToMany(targetEntity=Utilisateur::class)
     * @Groups({"envenement:read", "envenement:write","affaire:read", "entite:read"})
     */
    private $utilisateur;


    /**
     * @ORM\ManyToOne(targetEntity=Affaire::class, inversedBy="envenements")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"envenement:read", "envenement:write"})
     */
    private $affaire;


    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Groups({"envenement:read", "envenement:write","affaire:read", "entite:read"})
     */
    private $endAt;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"envenement:read", "envenement:write","affaire:read", "entite:read"})
     */
    private $geoLocalisation;

    /**
     * @ORM\OneToMany(targetEntity=Attachements::class, mappedBy="envenement", orphanRemoval=true,cascade={"persist", "remove"})
     */
    private $attachements;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $titre;



    public function __construct()
    {
        $this->entite = new ArrayCollection();
        $this->utilisateur = new ArrayCollection();
        $this->attachements = new ArrayCollection();

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

    public function setLocalisation(?string $localisation): self
    {
        $this->localisation = $localisation;

        return $this;
    }

    public function getStartAt(): ?\DateTimeInterface
    {
        return $this->startAt;
    }

    public function setStartAt(?\DateTimeInterface $startAt): self
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


    public function getEndAt(): ?\DateTimeInterface
    {
        return $this->endAt;
    }

    public function setEndAt(?\DateTimeInterface $endAt): self
    {
        $this->endAt = $endAt;

        return $this;
    }

    public function getGeoLocalisation(): ?string
    {
        return $this->geoLocalisation;
    }

    public function setGeoLocalisation(?string $geoLocalisation): self
    {
        $this->geoLocalisation = $geoLocalisation;

        return $this;
    }

    /**
     * @return Collection|Attachements[]
     */
    public function getAttachements(): Collection
    {
        return $this->attachements;
    }

    public function addAttachement(Attachements $attachement): self
    {
        if (!$this->attachements->contains($attachement)) {
            $this->attachements[] = $attachement;
            $attachement->setEnvenement($this);
        }

        return $this;
    }

    public function removeAttachement(Attachements $attachement): self
    {
        if ($this->attachements->removeElement($attachement)) {
            // set the owning side to null (unless already changed)
            if ($attachement->getEnvenement() === $this) {
                $attachement->setEnvenement(null);
            }
        }

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
