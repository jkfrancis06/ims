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
     * @Groups({"utilisateur:read", "departement:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     *  @Groups({"utilisateur:read","utilisateur:write", "departement:read","affaire:read"})
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Groups({"utilisateur:read","utilisateur:write", "departement:read","affaire:read"})
     */
    private $prenom;

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
     * @Groups({"utilisateur:read", "departement:read"})
     */
    private $createAt;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"utilisateur:read","utilisateur:write", "departement:read"})
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
     * @Groups({"utilisateur:read","utilisateur:write"})
     */
    private $departement;

    /**
     * @ORM\OneToMany(targetEntity=AffaireUtilisateur::class, mappedBy="utilisateur", orphanRemoval=true)
     * @Groups({"utilisateur:read"})
     */
    private $affaireUtilisateurs;






    public function __construct(){
        $this->createAt = new \DateTime();
        $this->salt = "";
        $this->affaires = new ArrayCollection();
        $this->affaireDepartements = new ArrayCollection();
        $this->affaireUtilisateurs = new ArrayCollection();
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

}
