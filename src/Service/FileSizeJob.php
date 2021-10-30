<?php

namespace App\Service;

use App\Entity\Attachements;

class FileSizeJob
{

    /**
     * @var string
     */
    private $affaireDir;

    /**
     * @var string
     */
    private $targetDirectory;

    /**
     * @var string
     */
    private $projectDir;

    /**
     * @var string
     */
    private $courrierDir;

    public function __construct(string $projectDir, string $courrierDir, string  $affaireDir, string $targetDirectory)
    {
        $this->projectDir = $projectDir;
        $this->courrierDir = $courrierDir;
        $this->affaireDir = $affaireDir;
        $this->targetDirectory = $targetDirectory;
    }


    public function getExtension(Attachements $attachement){

        return pathinfo($this->affaireDir.'/'.md5($attachement->getName()).'/'.$attachement->getName(), PATHINFO_EXTENSION);

    }

    public function getFileName(Attachements $attachement){

        return pathinfo($this->affaireDir.'/'.md5($attachement->getName()).'/'.$attachement->getName(), PATHINFO_FILENAME);

    }

    public function sizeInByte(Attachements $attachement){
        return filesize($this->affaireDir.'/'.md5($attachement->getName()).'/'.$attachement->getName());
    }

    public function getFileSize(Attachements $attachement){

        return $this->FileSizeConvert(filesize($this->affaireDir.'/'.md5($attachement->getName()).'/'.$attachement->getName()));

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

    function getThumbnail(Attachements $attachement): string
    {
        switch ($this->getExtension($attachement)){
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

}