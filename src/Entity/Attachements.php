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

    public function getExtension(){

        return pathinfo($this->name, PATHINFO_EXTENSION);

    }

    public function getFileName(){

        return pathinfo($this->name, PATHINFO_FILENAME);

    }

    public function sizeInByte(){
        return filesize("../public/upload/".$this->name);
    }

    public function getFileSize(){

        return $this->FileSizeConvert(filesize("../public/upload/".$this->name));

    }


    function FileSizeConvert($bytes)
    {
        $bytes = floatval($bytes);
        $arBytes = array(
            0 => array(
                "UNIT" => "TB",
                "VALUE" => pow(1024, 4)
            ),
            1 => array(
                "UNIT" => "GB",
                "VALUE" => pow(1024, 3)
            ),
            2 => array(
                "UNIT" => "MB",
                "VALUE" => pow(1024, 2)
            ),
            3 => array(
                "UNIT" => "KB",
                "VALUE" => 1024
            ),
            4 => array(
                "UNIT" => "B",
                "VALUE" => 1
            ),
        );

        foreach($arBytes as $arItem)
        {
            if($bytes >= $arItem["VALUE"])
            {
                $result = $bytes / $arItem["VALUE"];
                $result = str_replace(".", "," , strval(round($result, 2)))." ".$arItem["UNIT"];
                break;
            }
        }
        return $result;
    }

    function getThumbnail(): string
    {
        switch ($this->getExtension()){
            case 'docx':
            case 'doc':
                return '<i class="fas fa-file-word text-primary"></i>';
            case 'xlsx':
            case 'xls':
                return '<i class="fas fa-file-excel text-success"></i>';
            case 'pptx':
            case 'ppt':
                return '<i class="fas fa-file-powerpoint text-danger"></i>';
            case 'pdf':
                return '<i class="fas fa-file-pdf text-danger"></i>';
            case 'zip':
                return '<i class="fas fa-file-archive text-muted"></i>';
            case 'htm':
                return '<i class="fas fa-file-code text-info"></i>';
            case 'csv':
            case 'txt':
                return '<i class="fas fa-file-text text-info"></i>';
            case 'mp4':
            case 'avi':
            case 'mov':
                return '<i class="fas fa-file-video text-warning"></i>';
            case 'wav':
            case 'mp3':
                return '<i class="fas fa-file-audio text-warning"></i>';
            case 'jpeg':
            case 'jpg':
                return '<i class="fas fa-file-image text-danger"></i>';
            case 'gif':
                return '<i class="fas fa-file-image text-muted"></i>';
            case 'png':
                return '<i class="fas fa-file-image text-primary"></i>';
            default:
                return '<i class="fas fa-file text-primary"></i>';
        }
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
