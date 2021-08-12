<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\UtilisateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Validator\Constraints\UserPassword;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\MaxDepth;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\Validator\Constraints as SecurityAssert;



/**
 * @ApiResource(
 *      collectionOperations={
 *          "get"= {
 *               "access_control"="is_granted('ROLE_ADMIN')",
 *           },
 *          "post"= {
 *               "access_control"="is_granted('ROLE_ADMIN')",
 *           } *      },
 *      itemOperations={
 *          "get" = {
 *              "access_control"="is_granted('ROLE_ADMIN') or object == user",
 *           },
 *          "delete" = {
 *               "access_control"="is_granted('ROLE_ADMIN')",
 *           },
 *          "put" = {
 *               "access_control"="is_granted('ROLE_USER') and object == user",
 *           },
 *          "CHANGE-PASSWORD"={
 *              "method"="PUT",
 *              "path"="/utilisateur/change-password/{id}",
 *              "access_control"="is_granted('ROLE_USER') and object == user",
 *              "access_control_message"="Only the user can change its password",
 *              "controller"="App\Controller\ChangeUtilisateurPasswordController",
 *              "denormalization_context"={
 *                 "groups"={"put-reset-password:write"}
 *              },
 *              "validation_groups"={"validation-password"},
 *              "normalization_context"={"groups"={"put-reset-password:read"}},
 *          }
 *      },
 *     normalizationContext={"groups"={"utilisateur:read"},"enable_max_depth"=true},
 *     denormalizationContext={"groups"={"utilisateur:write"}}
 * )
 * @ORM\Entity(repositoryClass=UtilisateurRepository::class)
 * @UniqueEntity(fields={"username"}, message="Cet utilisateur existe déjà !!")
 */
class Utilisateur implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"envenement:read","utilisateur:read", "departement:read","tache:read","affaire:read","affaireUtilisateur:read","canConsult:read","affaireDirected:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     *  @Groups({"envenement:read","utilisateur:read","utilisateur:write", "departement:read","affaire:read","tache:read","affaireUtilisateur:read","canConsult:read","affaireDirected:read"})
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Groups({"envenement:read","utilisateur:read","utilisateur:write", "departement:read","affaire:read","tache:read","affaireUtilisateur:read","canConsult:read","affaireDirected:read"})
     */
    private $prenom;


    /**
     * @Assert\Range(
     *      min = 1,
     *      max = 5,
     *      notInRangeMessage = "You must be between {{ min }}cm and {{ max }}cm tall to enter",
     * )
     * @ORM\Column(type="integer")
     * @Assert\NotBlank
     * @Groups({"utilisateur:read","utilisateur:write", "departement:read","affaire:read","tache:read","affaireUtilisateur:read","affaireDirected:read"})
     */
    private $niveauAccreditation;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"utilisateur:read", "departement:read","affaireUtilisateur:read","affaireDirected:read"})
     */
    private $numeroMatricule;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Groups({"utilisateur:read","utilisateur:write", "departement:read"})
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @SerializedName("password")
     * @Groups({"utilisateur:read","utilisateur:write"})
     */
    private $plainPassword;

    /**
     * @Groups({"put-reset-password:write", "put-reset-password:read"})
     * @Assert\NotBlank(groups={"put-reset-password"})
     * @SecurityAssert\UserPassword(
     *     message = "Wrong value for your current password",
     *     groups={"validation-password"}
     * )
     */
    private $oldPassword;

    /**
     * @Groups({"put-reset-password:write", "put-reset-password:read"})
     * @Assert\NotBlank(groups={"validation-password"})
     */
    private $newPassword;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $salt;


    /**
     * @ORM\Column(type="datetime")
     * @Groups({"utilisateur:read", "departement:read","affaireDirected:read"})
     */
    private $createAt;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"utilisateur:read","utilisateur:write", "departement:read","affaireDirected:read"})
     */
    private $isActive;


    /**
     * @ORM\Column(type="array")
     * @Assert\NotBlank
     * @Groups({"utilisateur:read", "utilisateur:write","departement:read"})
     */
    private $roles = [];



    /**
     * @MaxDepth(1)
     * @ORM\ManyToOne(targetEntity=Departement::class, inversedBy="utilisateurs")
     * @Groups({"envenement:read","utilisateur:read","utilisateur:write","affaire:read","canConsult:read","affaireDirected:read"})
     */
    private $departement;

    /**
     * @ORM\OneToMany(targetEntity=AffaireUtilisateur::class, mappedBy="utilisateur", orphanRemoval=true)
     * @Groups({"utilisateur:read"})
     */
    private $affaireUtilisateurs;

    /**
     * @ORM\OneToMany(targetEntity=CanConsult::class, mappedBy="utilisateur", orphanRemoval=true)
     */
    private $canConsults;

    /**
     * @ORM\OneToMany(targetEntity=CanConsult::class, mappedBy="createdBy")
     */
    private $canConsultsCreated;

    /**
     * @ORM\OneToMany(targetEntity=Tache::class, mappedBy="createdBy")
s    */
    private $taches;

    /**
     * @ORM\OneToMany(targetEntity=TacheUtilisateur::class, mappedBy="utilisateur")
     */
    private $tacheUtilisateurs;

    /**
     * @ORM\OneToMany(targetEntity=AffaireDirected::class, mappedBy="utilisateur", orphanRemoval=true)
     */
    private $affaireDirecteds;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $lastLoginForUser;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $lastLogin;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isDeleted;






    public function __construct(){
        $this->createAt = new \DateTime();
        $this->salt = "";
        $this->affaires = new ArrayCollection();
        $this->affaireDepartements = new ArrayCollection();
        $this->affaireUtilisateurs = new ArrayCollection();
        $this->canConsults = new ArrayCollection();
        $this->canConsultsCreated = new ArrayCollection();

        //TODO remove below after tests

        $this->numeroMatricule = 'BHL-DNE-'.time().'-'.random_int(100, 999999);
        $this->taches = new ArrayCollection();
        $this->tacheUtilisateurs = new ArrayCollection();
        $this->affaireDirecteds = new ArrayCollection();

    }

    public function eraseCredentials()
    {
    }

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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getOldPassword(): ?string
    {
        return $this->oldPassword;
    }

    public function setOldPassword(string $oldPassword): self
    {
        $this->oldPassword = $oldPassword;

        return $this;
    }


    public function getNewPassword(): ?string
    {
        return $this->newPassword;
    }

    public function setNewPassword(string $newPassword): self
    {
        $this->newPassword = $newPassword;

        return $this;
    }


    public function getSalt(): ?string
    {
        return $this->salt;
    }

    public function setSalt(string $salt): self
    {
        $this->salt = $salt;

        return $this;
    }

    public function getIsActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): self
    {
        $this->isActive = $isActive;

        return $this;
    }

    public function getCreateAt(): ?\DateTimeInterface
    {
        return $this->createAt;
    }

    public function setCreateAt(\DateTimeInterface $createAt): self
    {
        $this->createAt = $createAt;

        return $this;
    }

    public function getRoles(): ?array
    {
        return $this->roles;
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

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


    public function getPlainPassword(): ?string
    {
        return $this->plainPassword;
    }
    public function setPlainPassword(string $plainPassword): self
    {
        $this->plainPassword = $plainPassword;
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
            $affaireUtilisateur->setUtilisateur($this);
        }

        return $this;
    }

    public function removeAffaireUtilisateur(AffaireUtilisateur $affaireUtilisateur): self
    {
        if ($this->affaireUtilisateurs->removeElement($affaireUtilisateur)) {
            // set the owning side to null (unless already changed)
            if ($affaireUtilisateur->getUtilisateur() === $this) {
                $affaireUtilisateur->setUtilisateur(null);
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
            $canConsult->setUtilisateur($this);
        }

        return $this;
    }

    public function removeCanConsult(CanConsult $canConsult): self
    {
        if ($this->canConsults->removeElement($canConsult)) {
            // set the owning side to null (unless already changed)
            if ($canConsult->getUtilisateur() === $this) {
                $canConsult->setUtilisateur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|CanConsult[]
     */
    public function getCanConsultsCreated(): Collection
    {
        return $this->canConsultsCreated;
    }

    public function addCanConsultsCreated(CanConsult $canConsultsCreated): self
    {
        if (!$this->canConsultsCreated->contains($canConsultsCreated)) {
            $this->canConsultsCreated[] = $canConsultsCreated;
            $canConsultsCreated->setCreatedBy($this);
        }

        return $this;
    }

    public function removeCanConsultsCreated(CanConsult $canConsultsCreated): self
    {
        if ($this->canConsultsCreated->removeElement($canConsultsCreated)) {
            // set the owning side to null (unless already changed)
            if ($canConsultsCreated->getCreatedBy() === $this) {
                $canConsultsCreated->setCreatedBy(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Tache[]
     */
    public function getTaches(): Collection
    {
        return $this->taches;
    }

    public function addTach(Tache $tach): self
    {
        if (!$this->taches->contains($tach)) {
            $this->taches[] = $tach;
            $tach->setCreatedBy($this);
        }

        return $this;
    }

    public function removeTach(Tache $tach): self
    {
        if ($this->taches->removeElement($tach)) {
            // set the owning side to null (unless already changed)
            if ($tach->getCreatedBy() === $this) {
                $tach->setCreatedBy(null);
            }
        }

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
            $tacheUtilisateur->setUtilisateur($this);
        }

        return $this;
    }

    public function removeTacheUtilisateur(TacheUtilisateur $tacheUtilisateur): self
    {
        if ($this->tacheUtilisateurs->removeElement($tacheUtilisateur)) {
            // set the owning side to null (unless already changed)
            if ($tacheUtilisateur->getUtilisateur() === $this) {
                $tacheUtilisateur->setUtilisateur(null);
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
            $affaireDirected->setUtilisateur($this);
        }

        return $this;
    }

    public function removeAffaireDirected(AffaireDirected $affaireDirected): self
    {
        if ($this->affaireDirecteds->removeElement($affaireDirected)) {
            // set the owning side to null (unless already changed)
            if ($affaireDirected->getUtilisateur() === $this) {
                $affaireDirected->setUtilisateur(null);
            }
        }

        return $this;
    }

    public function getLastLoginForUser(): ?\DateTimeInterface
    {
        return $this->lastLoginForUser;
    }

    public function setLastLoginForUser(?\DateTimeInterface $lastLoginForUser): self
    {
        $this->lastLoginForUser = $lastLoginForUser;

        return $this;
    }

    public function getLastLogin(): ?\DateTimeInterface
    {
        return $this->lastLogin;
    }

    public function setLastLogin(?\DateTimeInterface $lastLogin): self
    {
        $this->lastLogin = $lastLogin;

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
