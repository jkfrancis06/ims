<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AttachementsRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *      collectionOperations={
 *          "get"= {
 *              "access_control"="is_granted('USER_VIEW_AFF', object)"
 *           },
 *          "post"= {
 *              "access_control"="is_granted('USER_OWN_AFF', object)"
 *           },
 *      },
 *      itemOperations={
 *          "get"= {
 *              "access_control"="is_granted('USER_VIEW_AFF', object)"
 *           },
 *          "delete"= {
 *              "access_control"="is_granted('USER_OWN_AFF', object)"
 *           },
 *          "put"= {
 *              "access_control"="is_granted('USER_OWN_AFF', object)"
 *           }
 *      },
 *     normalizationContext={"groups"={"attachements:read"}},
 *     denormalizationContext={"groups"={"attachements:write"}}
 * )
 * @ORM\Entity(repositoryClass=AttachementsRepository::class)
 */
class Attachements
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"entite:read","entite:write", "attachements:read","utilisateur:read","affaire:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"entite:read","entite:write", "attachements:read","attachements:write","utilisateur:read","affaire:read"})
     */
    private $name;

    /**
     * @ORM\Column(type="integer", length=255)
     * @Groups({"entite:read","entite:write", "attachements:read","attachements:write","utilisateur:read","affaire:read"})
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"entite:read","entite:write", "attachements:read","attachements:write","utilisateur:read","affaire:read"})
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity=Entites::class, inversedBy="attachements")
     * @ORM\JoinColumn()
     * @Groups({"attachements:read","attachements:write","entite:write"})
     */
    private $entite;

    /**
     * @ORM\ManyToOne(targetEntity=Envenement::class, inversedBy="attachements")
     */
    private $envenement;


    /**
     * @var UploadedFile
     */
    protected $file;



    public function getId(): ?int
    {
        return $this->id;
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

    public function getEntite(): ?Entites
    {
        return $this->entite;
    }

    public function setEntite(?Entites $entite): self
    {
        $this->entite = $entite;

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

    public function getType(): ?int
    {
        return $this->type;
    }

    public function setType(int $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getEnvenement(): ?Envenement
    {
        return $this->envenement;
    }

    public function setEnvenement(?Envenement $envenement): self
    {
        $this->envenement = $envenement;

        return $this;
    }





    /**
     * @param UploadedFile $file - Uploaded File
     */
    public function setFile($file)
    {
        $this->file = $file;
    }

    /**
     * @return UploadedFile
     */
    public function getFile()
    {
        return $this->file;
    }

}
