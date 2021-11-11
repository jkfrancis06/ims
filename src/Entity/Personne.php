<?php

namespace App\Entity;

use App\Repository\PersonneRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=PersonneRepository::class)
 */
class Personne extends Entites
{

    const SEXE_IND = 'i';
    const SEXE_HOMME = 'h';
    const SEXE_FEMME = 'f';

    const SIT_MARIE = 1;
    const SIT_DIVORCE = 2;
    const SIT_CELIBATAIRE = 3;
    const SIT_IND = null;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"entite:read", "entite:write"})
     */
    protected $nom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"entite:read", "entite:write"})
     */
    protected $prenom;

    /**
     * @ORM\Column(type="date", nullable=true)
     * @Groups({"entite:read", "entite:write"})
     */
    protected $dateNaissance;


    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"entite:read", "entite:write"})
     */
    protected $sexe;



    /**
     * @ORM\Column(type="text")
     * @Groups({"entite:read", "entite:write"})
     */
    protected $description;


    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"entite:read", "entite:write"})
     */
    protected $numPassport;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"entite:read", "entite:write"})
     */
    protected $numCarte;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"entite:read", "entite:write"})
     */
    protected $nationalite;

    /**
     * @ORM\OneToMany(targetEntity=Alias::class, mappedBy="personne", orphanRemoval=true,cascade={"persist", "remove"})
     * @Groups({"entite:read", "entite:write"})
     */
    private $aliases;

    /**
     * @ORM\ManyToMany(targetEntity=Telephone::class, inversedBy="personnes",cascade={"persist", "remove"})
     */
    private $telephone;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $taille;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $situationMatri;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresse;


    public function __construct()
    {
        $this->mainPicture = "icon-default.png";
        $this->description = $this->nom;
        $this->description2 = $this->prenom;
        $this->createdAt = new \DateTime();
        $this->aliases = new ArrayCollection();
        $this->attachements = new ArrayCollection();
        $this->telephone = new ArrayCollection();
    }


    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;
        $this->description = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;
        $this->description2 = $prenom;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(?\DateTimeInterface $dateNaissance): self
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    public function getLieuNaissance(): ?string
    {
        return $this->lieuNaissance;
    }

    public function setLieuNaissance(?string $lieuNaissance): self
    {
        $this->lieuNaissance = $lieuNaissance;

        return $this;
    }

    public function getNumPassport(): ?string
    {
        return $this->numPassport;
    }

    public function setNumPassport(?string $numPassport): self
    {
        $this->numPassport = $numPassport;

        return $this;
    }

    public function getNumCarte(): ?string
    {
        return $this->numCarte;
    }

    public function setNumCarte(?string $numCarte): self
    {
        $this->numCarte = $numCarte;

        return $this;
    }

    public function getNationalite(): ?string
    {
        return $this->nationalite;
    }

    public function setNationalite(string $nationalite): self
    {
        $this->nationalite = $nationalite;

        return $this;
    }

    /**
     * @return Collection|Alias[]
     */
    public function getAliases(): Collection
    {
        return $this->aliases;
    }

    public function addAlias(Alias $alias): self
    {
        if (!$this->aliases->contains($alias)) {
            $this->aliases[] = $alias;
            $alias->setPersonne($this);
        }

        return $this;
    }

    public function removeAlias(Alias $alias): self
    {
        if ($this->aliases->removeElement($alias)) {
            // set the owning side to null (unless already changed)
            if ($alias->getPersonne() === $this) {
                $alias->setPersonne(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Telephone[]
     */
    public function getTelephone(): Collection
    {
        return $this->telephone;
    }

    public function addTelephone(Telephone $telephone): self
    {
        if (!$this->telephone->contains($telephone)) {
            $this->telephone[] = $telephone;
        }

        $telephone->addPersonne($this);


        return $this;
    }

    public function removeTelephone(Telephone $telephone): self
    {
        $this->telephone->removeElement($telephone);

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

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(?string $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }


    public function isPersonne(){
        return true;
    }

    public function getTaille(): ?int
    {
        return $this->taille;
    }

    public function setTaille(?int $taille): self
    {
        $this->taille = $taille;

        return $this;
    }

    public function getSituationMatri(): ?int
    {
        return $this->situationMatri;
    }

    public function setSituationMatri(?int $situationMatri): self
    {
        $this->situationMatri = $situationMatri;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }




}
