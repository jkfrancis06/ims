<?php

namespace App\Entity;

use App\Repository\CourrierRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 * @ORM\Entity(repositoryClass=CourrierRepository::class)
 * @UniqueEntity(fields={"referenceInterne"}, message="Un courrier de cette reference  existe deja !!",groups={"create"})
 */
class Courrier
{

    const FLUX_ENTRANT = 1;
    const FLUX_SORTANT = 2;

    const COURRIER_OFF = 0;
    const COURRIER_NOTE = 1;
    const COURRIER_FORUM = 3;

    const STATUT_RECU = 0;
    const STATUT_ACCUSE = 1;
    const STATUT_AFFECTE = 2;
    const STATUT_TRAITE = 3;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $flux;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $origine;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $destination;


    /**
     * @ORM\Column(type="date")
     */
    private $datecourrier;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $referenceInterne;

    /**
     * @ORM\Column(type="text")
     */
    private $sujet;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $contenu;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity=Utilisateur::class, inversedBy="courriers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $createdBy;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="integer")
     */
    private $statut;

    /**
     * @ORM\Column(type="text")
     */
    private $commentaire;

    /**
     * @ORM\OneToMany(targetEntity=PieceJointe::class, mappedBy="courrier",cascade={"persist", "remove"})
     */
    private $piecejointe;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isResponse;

    /**
     * @ORM\ManyToOne(targetEntity=Courrier::class, inversedBy="responses")
     */
    private $responseTo;

    /**
     * @ORM\OneToMany(targetEntity=Courrier::class, mappedBy="responseTo")
     */
    private $responses;

    /**
     * @ORM\ManyToOne(targetEntity=Departement::class, inversedBy="courriers")
     */
    private $affectation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $entry;

    /**
     * @ORM\ManyToOne(targetEntity=IntelPartner::class, inversedBy="courriers")
     */
    private $sender;

    /**
     * @ORM\ManyToOne(targetEntity=IntelPartner::class, inversedBy="recuCourriers")
     */
    private $receiver;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $lastUpdate;

    /**
     * @ORM\Column(type="boolean", options={"default" : false})
     */
    private $isDeleted;




    public function __construct()
    {
        $this->lastUpdate = new \DateTime();
        $this->isDeleted = false;
        $this->isResponse = false;
        $this->piecejointe = new ArrayCollection();
        $this->createdAt = new \DateTime();
        $this->responses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFlux(): ?int
    {
        return $this->flux;
    }

    public function setFlux(int $flux): self
    {
        $this->flux = $flux;

        return $this;
    }

    public function getOrigine(): ?string
    {
        return $this->origine;
    }

    public function setOrigine(?string $origine): self
    {
        $this->origine = $origine;

        return $this;
    }

    public function getDestination(): ?string
    {
        return $this->destination;
    }

    public function setDestination(?string $destination): self
    {
        $this->destination = $destination;

        return $this;
    }


    public function getDatecourrier(): ?\DateTimeInterface
    {
        return $this->datecourrier;
    }

    public function setDatecourrier(?\DateTimeInterface $datecourrier): self
    {
        $this->datecourrier = $datecourrier;

        return $this;
    }

    public function getReferenceInterne(): ?string
    {
        return $this->referenceInterne;
    }

    public function setReferenceInterne(string $referenceInterne): self
    {
        $this->referenceInterne = $referenceInterne;

        return $this;
    }

    public function getSujet(): ?string
    {
        return $this->sujet;
    }

    public function setSujet(string $sujet): self
    {
        $this->sujet = $sujet;

        return $this;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(?string $contenu): self
    {
        $this->contenu = $contenu;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

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

    public function getStatut(): ?int
    {
        return $this->statut;
    }

    public function setStatut(int $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(string $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * @return Collection|PieceJointe[]
     */
    public function getPiecejointe(): Collection
    {
        return $this->piecejointe;
    }

    public function addPiecejointe(PieceJointe $piecejointe): self
    {
        if (!$this->piecejointe->contains($piecejointe)) {
            $this->piecejointe[] = $piecejointe;
            $piecejointe->setCourrier($this);
        }

        return $this;
    }

    public function removePiecejointe(PieceJointe $piecejointe): self
    {
        if ($this->piecejointe->removeElement($piecejointe)) {
            // set the owning side to null (unless already changed)
            if ($piecejointe->getCourrier() === $this) {
                $piecejointe->setCourrier(null);
            }
        }

        return $this;
    }

    public function getIsResponse(): ?bool
    {
        return $this->isResponse;
    }

    public function setIsResponse(bool $isResponse): self
    {
        $this->isResponse = $isResponse;

        return $this;
    }

    public function getResponseTo(): ?self
    {
        return $this->responseTo;
    }

    public function setResponseTo(?self $responseTo): self
    {
        $this->responseTo = $responseTo;

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getResponses(): Collection
    {
        return $this->responses;
    }

    public function addResponse(self $response): self
    {
        if (!$this->responses->contains($response)) {
            $this->responses[] = $response;
            $response->setResponseTo($this);
        }

        return $this;
    }

    public function removeResponse(self $response): self
    {
        if ($this->responses->removeElement($response)) {
            // set the owning side to null (unless already changed)
            if ($response->getResponseTo() === $this) {
                $response->setResponseTo(null);
            }
        }

        return $this;
    }

    public function getAffectation(): ?Departement
    {
        return $this->affectation;
    }

    public function setAffectation(?Departement $affectation): self
    {
        $this->affectation = $affectation;

        return $this;
    }

    public function getEntry(): ?string
    {
        return $this->entry;
    }

    public function setEntry(?string $entry): self
    {
        $this->entry = $entry;

        return $this;
    }

    public function getSender(): ?IntelPartner
    {
        return $this->sender;
    }

    public function setSender(?IntelPartner $sender): self
    {
        $this->sender = $sender;

        return $this;
    }

    public function getReceiver(): ?IntelPartner
    {
        return $this->receiver;
    }

    public function setReceiver(?IntelPartner $receiver): self
    {
        $this->receiver = $receiver;

        return $this;
    }

    public function getLastUpdate(): ?\DateTimeInterface
    {
        return $this->lastUpdate;
    }

    public function setLastUpdate(?\DateTimeInterface $lastUpdate): self
    {
        $this->lastUpdate = $lastUpdate;

        return $this;
    }

    public function getIsDeleted(): ?bool
    {
        return $this->isDeleted;
    }

    public function setIsDeleted(bool $isDeleted): self
    {
        $this->isDeleted = $isDeleted;

        return $this;
    }
}
