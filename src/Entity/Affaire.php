<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AffaireRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\MaxDepth;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use App\Validator as AppAssert;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Bridge\Elasticsearch\DataProvider\Filter\TermFilter;
use ApiPlatform\Core\Bridge\Elasticsearch\DataProvider\Filter\MatchFilter;


/**
 * @ApiResource(
 *      collectionOperations={
 *          "get"= {
 *               "access_control"="is_granted('ROLE_USER')"
 *           },
 *          "GET-USER-AFFAIRE"={
 *              "method"="GET",
 *              "path"="/utilisateur/affaire/get",
 *              "access_control"="is_granted('ROLE_USER')",
 *              "controller"="App\Controller\GetUserAffaireController",
 *              "denormalization_context"={
 *                 "groups"={"affaire:write"}
 *              },
 *              "normalization_context"={"groups"={"affaire:read"}},
 *          },
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
 *     normalizationContext={"groups"={"affaire:read"}},
 *     denormalizationContext={"groups"={"affaire:write"}}
 * )
 * @ApiFilter(SearchFilter::class,properties={"nom":"ipartial","numeroMatricule":"ipartial","departement.id": "exact"})
 * @ORM\Table(name="affaire")
 * @ORM\Entity(repositoryClass=AffaireRepository::class)
 * @UniqueEntity(fields={"nom"}, message="Une affaire de ce nom existe deja !!")
 * @UniqueEntity(fields={"numeroMatricule"}, message="Une affaire de ce matricule existe deja !!")
 * @AppAssert\AffaireAcrreditation()
 */
class Affaire
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"affaire:read", "departement:read","utilisateur:read", "entite:read","tache:read","canConsult:read","affaireDirected:read"})
     */
    private $id;


    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"affaire:read", "departement:read","utilisateur:read", "entite:read","tache:read","canConsult:read","affaireDirected:read"})
     */
    private $numeroMatricule;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"affaire:read", "affaire:write", "departement:read","utilisateur:read", "entite:read","tache:read","canConsult:read","affaireDirected:read"})
     */
    private $nom;

    /**
     * @ORM\Column(type="text")
     * @Groups({"affaire:read", "affaire:write", "departement:read","utilisateur:read", "entite:read","canConsult:read","affaireDirected:read"})
     */
    private $description;

    /**
    /**
     * @Assert\Range(
     *      min = 1,
     *      max = 5,
     *      notInRangeMessage = "Le niveau d'accreditation doit etre entre {{ min }} et{{ max }}",
     * )
     *
     * @ORM\Column(type="integer")
     * @Groups({"affaire:read", "affaire:write", "departement:read","utilisateur:read", "entite:read","canConsult:read","affaireDirected:read"})
     */
    private $niveauAccreditation;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"affaire:read", "affaire:write", "departement:read","utilisateur:read", "entite:read","canConsult:read","affaireDirected:read"})
     */
    private $statut;


    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"affaire:read", "affaire:write", "departement:read","utilisateur:read", "entite:read","canConsult:read","affaireDirected:read"})
     */
    private $source;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"affaire:read", "affaire:write", "departement:read","utilisateur:read", "entite:read","canConsult:read","affaireDirected:read"})
     */
    private $resume;


    /**
     * @ORM\Column(type="datetime")
     * @Groups({"affaire:read", "affaire:write", "departement:read","utilisateur:read", "entite:read","canConsult:read","affaireDirected:read"})
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"affaire:read", "affaire:write", "departement:read","utilisateur:read","canConsult:read","affaireDirected:read"})
     */
    private $lastUpdate;

    /**
     * @ORM\ManyToOne(targetEntity=Utilisateur::class)
     * @Groups({"affaire:read", "affaire:write", "departement:read","canConsult:read","affaireDirected:read"})
     */
    private $createdBy;

    /**
     * @MaxDepth(1)
     * @ORM\ManyToOne(targetEntity=Departement::class, inversedBy="affaires")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"affaire:read","affaire:write","createAffaire:write", "entite:read","canConsult:read"})
     */
    private $departement;

    /**
     * @ORM\OneToMany(targetEntity=AffaireUtilisateur::class, mappedBy="affaire", orphanRemoval=true)
     * @Groups({"affaire:read", "affaire:write", "entite:read","canConsult:read"})
     */
    private $affaireUtilisateurs;

    /**
     * @ORM\OneToMany(targetEntity=CanConsult::class, mappedBy="affaire", orphanRemoval=true)
     * @Groups({"affaire:read"})
     */
    private $canConsults;

    /**
     * @ORM\OneToMany(targetEntity=Entites::class, mappedBy="affaire", orphanRemoval=true)
     * @Groups({"affaire:read","canConsult:read"})
     */
    private $entites;

    /**
     * @ORM\OneToMany(targetEntity=Envenement::class, mappedBy="affaire", orphanRemoval=true)
     */
    private $envenements;

    /**
     * @ORM\OneToMany(targetEntity=AffaireDirected::class, mappedBy="affaire", orphanRemoval=true)
     */
    private $affaireDirecteds;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"affaire:read", "affaire:write", "departement:read","canConsult:read","affaireDirected:read"})
     */
    private $rapportFinal;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Groups({"affaire:read", "affaire:write", "departement:read","canConsult:read","affaireDirected:read"})
     */
    private $clotureAt;




    public function __construct() {
        $this->createdAt = new \DateTime();
        $this->lastUpdate = new \DateTime();
        $this->statut = 'Ouvert';
        $this->affaireUtilisateurs = new ArrayCollection();
        $this->canConsults = new ArrayCollection();
        $this->entites = new ArrayCollection();

        //TODO remove below after tests

        $this->numeroMatricule = date("Y").'-000'.date("m").'-AFF-DNE- '.time().'-'.random_int(100, 999999);
        $this->envenements = new ArrayCollection();
        $this->affaireDirecteds = new ArrayCollection();



    }


    public function getId(): ?int
    {
        return $this->id;
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

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getSource(): ?string
    {
        return $this->source;
    }

    public function setSource(?string $source): self
    {
        $this->source = $source;

        return $this;
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

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

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

    public function getLastUpdate(): ?\DateTimeInterface
    {
        return $this->lastUpdate;
    }

    public function setLastUpdate(\DateTimeInterface $lastUpdate): self
    {
        $this->lastUpdate = $lastUpdate;

        return $this;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDepartement(): ?Departement
    {
        return $this->departement;
    }

    public function setDepartement(?Departement $departement): self
    {
        $this->departement = $departement;

        return $this;
    }

    /**
     * @return Collection|AffaireUtilisateur[]
     */
    public function getAffaireUtilisateurs(): Collection
    {
        return $this->affaireUtilisateurs;
    }

    public function addAffaireUtilisateur(AffaireUtilisateur $affaireUtilisateur): self
    {
        if (!$this->affaireUtilisateurs->contains($affaireUtilisateur)) {
            $this->affaireUtilisateurs[] = $affaireUtilisateur;
            $affaireUtilisateur->setAffaire($this);
        }

        return $this;
    }

    public function removeAffaireUtilisateur(AffaireUtilisateur $affaireUtilisateur): self
    {
        if ($this->affaireUtilisateurs->removeElement($affaireUtilisateur)) {
            // set the owning side to null (unless already changed)
            if ($affaireUtilisateur->getAffaire() === $this) {
                $affaireUtilisateur->setAffaire(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|CanConsult[]
     */
    public function getCanConsults(): Collection
    {
        return $this->canConsults;
    }

    public function addCanConsult(CanConsult $canConsult): self
    {
        if (!$this->canConsults->contains($canConsult)) {
            $this->canConsults[] = $canConsult;
            $canConsult->setAffaire($this);
        }

        return $this;
    }

    public function removeCanConsult(CanConsult $canConsult): self
    {
        if ($this->canConsults->removeElement($canConsult)) {
            // set the owning side to null (unless already changed)
            if ($canConsult->getAffaire() === $this) {
                $canConsult->setAffaire(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Entites[]
     */
    public function getEntites(): Collection
    {
        return $this->entites;
    }

    public function addEntite(Entites $entite): self
    {
        if (!$this->entites->contains($entite)) {
            $this->entites[] = $entite;
            $entite->setAffaire($this);
        }

        return $this;
    }

    public function removeEntite(Entites $entite): self
    {
        if ($this->entites->removeElement($entite)) {
            // set the owning side to null (unless already changed)
            if ($entite->getAffaire() === $this) {
                $entite->setAffaire(null);
            }
        }

        return $this;
    }

    public function getNumeroMatricule(): ?string
    {
        return $this->numeroMatricule;
    }

    public function setNumeroMatricule(string $numeroMatricule): self
    {
        $this->numeroMatricule = $numeroMatricule;

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

    /**
     * @return Collection|Envenement[]
     */
    public function getEnvenements(): Collection
    {
        return $this->envenements;
    }

    public function addEnvenement(Envenement $envenement): self
    {
        if (!$this->envenements->contains($envenement)) {
            $this->envenements[] = $envenement;
            $envenement->setAffaire($this);
        }

        return $this;
    }

    public function removeEnvenement(Envenement $envenement): self
    {
        if ($this->envenements->removeElement($envenement)) {
            // set the owning side to null (unless already changed)
            if ($envenement->getAffaire() === $this) {
                $envenement->setAffaire(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|AffaireDirected[]
     */
    public function getAffaireDirecteds(): Collection
    {
        return $this->affaireDirecteds;
    }

    public function addAffaireDirected(AffaireDirected $affaireDirected): self
    {
        if (!$this->affaireDirecteds->contains($affaireDirected)) {
            $this->affaireDirecteds[] = $affaireDirected;
            $affaireDirected->setAffaire($this);
        }

        return $this;
    }

    public function removeAffaireDirected(AffaireDirected $affaireDirected): self
    {
        if ($this->affaireDirecteds->removeElement($affaireDirected)) {
            // set the owning side to null (unless already changed)
            if ($affaireDirected->getAffaire() === $this) {
                $affaireDirected->setAffaire(null);
            }
        }

        return $this;
    }

    public function getRapportFinal(): ?string
    {
        return $this->rapportFinal;
    }

    public function setRapportFinal(?string $rapportFinal): self
    {
        $this->rapportFinal = $rapportFinal;

        return $this;
    }

    public function getClotureAt(): ?\DateTimeInterface
    {
        return $this->clotureAt;
    }

    public function setClotureAt(?\DateTimeInterface $clotureAt): self
    {
        $this->clotureAt = $clotureAt;

        return $this;
    }


    public function __toString()
    {
        return $this->numeroMatricule .' / '. $this->nom;
    }

}
