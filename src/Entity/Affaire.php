<?php

namespace App\Entity;

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


/**
 * @ApiResource(
 *      collectionOperations={
 *          "get"= {
 *               "access_control"="is_granted('ROLE_ADMIN')"
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
 *              "access_control"="is_granted('USER_VIEW_AFF')",
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
 * @ORM\Entity(repositoryClass=AffaireRepository::class)
 * @UniqueEntity(fields={"nom"}, message="Une affaire de ce nom existe deja !!")
 * @UniqueEntity(fields={"numeroMatricule"}, message="Une affaire de ce matricule existe deja !!")
 * @AppAssert\AffaireInDepartement()
 * @AppAssert\AffaireAcrreditation()
 */
class Affaire
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"affaire:read", "departement:read","utilisateur:read", "entite:read","tache:read"})
     */
    private $id;


    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"affaire:read", "departement:read","utilisateur:read", "entite:read","tache:read"})
     */
    private $numeroMatricule;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"affaire:read", "affaire:write", "departement:read","utilisateur:read", "entite:read","tache:read"})
     */
    private $nom;

    /**
     * @ORM\Column(type="text")
     * @Groups({"affaire:read", "affaire:write", "departement:read","utilisateur:read", "entite:read"})
     */
    private $description;

    /**
    /**
     * @Assert\Range(
     *      min = 1,
     *      max = 5,
     *      notInRangeMessage = "You must be between {{ min }}cm and {{ max }}cm tall to enter",
     * )
     *
     * @ORM\Column(type="integer")
     * @Groups({"affaire:read", "affaire:write", "departement:read","utilisateur:read", "entite:read"})
     */
    private $niveauAccreditation;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"affaire:read", "affaire:write", "departement:read","utilisateur:read", "entite:read"})
     */
    private $statut;


    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"affaire:read", "affaire:write", "departement:read","utilisateur:read", "entite:read"})
     */
    private $source;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"affaire:read", "affaire:write", "departement:read","utilisateur:read", "entite:read"})
     */
    private $resume;


    /**
     * @ORM\Column(type="datetime")
     * @Groups({"affaire:read", "affaire:write", "departement:read","utilisateur:read", "entite:read"})
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"affaire:read", "affaire:write", "departement:read","utilisateur:read"})
     */
    private $lastUpdate;

    /**
     * @ORM\ManyToOne(targetEntity=Utilisateur::class)
     * @Groups({"affaire:read", "affaire:write", "departement:read"})
     */
    private $createdBy;

    /**
     * @MaxDepth(1)
     * @ORM\ManyToOne(targetEntity=Departement::class, inversedBy="affaires")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"affaire:read","affaire:write","createAffaire:write", "entite:read"})
     */
    private $departement;

    /**
     * @ORM\OneToMany(targetEntity=AffaireUtilisateur::class, mappedBy="affaire", orphanRemoval=true)
     * @Groups({"affaire:read", "affaire:write", "entite:read"})
     */
    private $affaireUtilisateurs;

    /**
     * @ORM\OneToMany(targetEntity=CanConsult::class, mappedBy="affaire", orphanRemoval=true)
     * @Groups({"affaire:read"})
     */
    private $canConsults;

    /**
     * @ORM\OneToMany(targetEntity=Entites::class, mappedBy="affaire", orphanRemoval=true)
     * @Groups({"affaire:read"})
     */
    private $entites;



    public function __construct() {
        $this->createdAt = new \DateTime();
        $this->lastUpdate = new \DateTime();
        $this->statut = 'Ouvert';
        $this->affaireUtilisateurs = new ArrayCollection();
        $this->canConsults = new ArrayCollection();
        $this->entites = new ArrayCollection();

        //TODO remove below after tests

        $this->numeroMatricule = date("Y").'-000'.date("m").'-AFF-DNE- '.time().'-'.random_int(100, 999999);



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


}
