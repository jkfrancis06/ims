<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\EntitesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;


/**
 * @ORM\Entity(repositoryClass=EntitesRepository::class)
 * @ORM\Table(name="entite", indexes={@ORM\Index(name="type_idx", columns={"type"})})
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="type", type="string", length=3)
 * @ORM\DiscriminatorMap({
 *     "Per"="Personne",
 *     "Veh"="Vehicule",
 *     "Org"="Organisation"
 * })
 * @ApiResource(
 *      collectionOperations={
 *          "get"= {
 *              "access_control"="is_granted('ROLE_USER')"
 *           },
 *           "GET-AFFAIRE-ENTITES"={
 *              "method"="GET",
 *              "path"="/affaire-entites/get/{id}",
 *              "controller"="App\Controller\GetAffaireEntiteController",
 *              "denormalization_context"={
 *                 "groups"={"entite:write"}
 *              },
 *              "normalization_context"={"groups"={"entite:read"}},
 *          },
 *          "post"= {
 *              "access_control"="is_granted('USER_VIEW_AFF', object)"
 *           },
 *      },
 *      itemOperations={
 *          "get"= {
 *              "access_control"="is_granted('USER_VIEW_AFF', object)"
 *           },
 *          "delete"= {
 *              "access_control"="is_granted('USER_VIEW_AFF', object)"
 *           },
 *          "put"= {
 *              "access_control"="is_granted('USER_VIEW_AFF', object)"
 *           }
 *      },
 *     normalizationContext={"groups"={"entite:read"}},
 *     denormalizationContext={"groups"={"entite:write"}}
 *
 * )
 * @ApiFilter(SearchFilter::class,properties={"description":"iexact","description2":"iexact"})
 */
abstract class Entites
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"entite:read", "entite:read","utilisateur:read","affaire:read","attachements:read"})
     */
    protected $id;

    /**
     * @ORM\Column(type="string", nullable=true ,length=255)
     * @Groups({"entite:read", "entite:write","affaire:read","attachements:read"})
     */
    protected $description;

    /**
     * @ORM\Column(type="string", nullable=true, length=255)
     * @Groups({"entite:read", "entite:write","affaire:read","attachements:read"})
     */
    protected $description2;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"entite:read", "entite:write","affaire:read","attachements:read"})
     */
    protected $role;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"entite:read", "entite:write","affaire:read","attachements:read"})
     */
    protected $cat;

    /**
     * @ORM\Column(type="string", length=255, options={"default": "icon-default.png"})
     * @Groups({"entite:read", "entite:write","affaire:read"})
     */
    protected $mainPicture;


    /**
     * @ORM\Column(type="text", options={"default": ""})
     * @Groups({"entite:read", "entite:write","affaire:read"})
     */
    protected $resume;

    /**
     * @ORM\ManyToOne(targetEntity=Affaire::class, inversedBy="entites")
     * @ORM\JoinColumn()
     * @Groups({"entite:read", "entite:write"})
     */
    protected $affaire;

    /**
     * @ORM\OneToMany(targetEntity=Attachements::class, mappedBy="entite", orphanRemoval=true,cascade={"persist", "remove"})
     * @Groups({"entite:read","entite:write"})
     */
    protected $attachements;

    /**
     * @ORM\OneToMany(targetEntity=RelatedTo::class, mappedBy="parent")
     */
    protected $ParentOf;

    /**
     * @ORM\OneToMany(targetEntity=RelatedTo::class, mappedBy="child")
     */
    protected $ChildOf;

    /**
     * @ORM\ManyToMany(targetEntity=Envenement::class, mappedBy="entite")
     */
    protected $envenements;



    public function __construct(){
        $this->mainPicture = "icon-default.png";
        $this->attachements = new ArrayCollection();
        $this->ParentOf = new ArrayCollection();
        $this->ChildOf = new ArrayCollection();
        $this->envenements = new ArrayCollection();
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

    public function getDescription2(): ?string
    {
        return $this->description2;
    }

    public function setDescription2(string $description2): self
    {
        $this->description2 = $description2;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;

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

    public function getMainPicture(): ?string
    {
        return $this->mainPicture;
    }

    public function setMainPicture(string $mainPicture): self
    {
        $this->mainPicture = $mainPicture;

        return $this;
    }

    /**
     * @return Collection|Attachements[]|null
     */
    public function getAttachements(): Collection
    {
        return $this->attachements;
    }

    public function addAttachement(Attachements $attachement): self
    {
        if (!$this->attachements->contains($attachement)) {
            $this->attachements[] = $attachement;
            $attachement->setEntite($this);
        }

        return $this;
    }

    public function removeAttachement(Attachements $attachement): self
    {
        if ($this->attachements->removeElement($attachement)) {
            // set the owning side to null (unless already changed)
            if ($attachement->getEntite() === $this) {
                $attachement->setEntite(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|RelatedTo[]
     */
    public function getParentOf(): Collection
    {
        return $this->ParentOf;
    }

    public function addParentOf(RelatedTo $parentOf): self
    {
        if (!$this->ParentOf->contains($parentOf)) {
            $this->ParentOf[] = $parentOf;
            $parentOf->setParent($this);
        }

        return $this;
    }

    public function removeParentOf(RelatedTo $parentOf): self
    {
        if ($this->ParentOf->removeElement($parentOf)) {
            // set the owning side to null (unless already changed)
            if ($parentOf->getParent() === $this) {
                $parentOf->setParent(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|RelatedTo[]
     */
    public function getChildOf(): Collection
    {
        return $this->ChildOf;
    }

    public function addChildOf(RelatedTo $childOf): self
    {
        if (!$this->ChildOf->contains($childOf)) {
            $this->ChildOf[] = $childOf;
            $childOf->setChild($this);
        }

        return $this;
    }

    public function removeChildOf(RelatedTo $childOf): self
    {
        if ($this->ChildOf->removeElement($childOf)) {
            // set the owning side to null (unless already changed)
            if ($childOf->getChild() === $this) {
                $childOf->setChild(null);
            }
        }

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
            $envenement->addEntite($this);
        }

        return $this;
    }

    public function removeEnvenement(Envenement $envenement): self
    {
        if ($this->envenements->removeElement($envenement)) {
            $envenement->removeEntite($this);
        }

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

    public function getCat(): ?int
    {
        return $this->cat;
    }

    public function setCat(int $cat): self
    {
        $this->cat = $cat;

        return $this;
    }
}
