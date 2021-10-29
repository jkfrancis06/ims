<?php


namespace App\Service;

use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\String\Slugger\SluggerInterface;


class FileUploader
{

    private $targetDirectory;
    private $slugger;
    private $affaireDir;

    public function __construct($targetDirectory, SluggerInterface $slugger, string $affaireDir)
    {
        $this->targetDirectory = $targetDirectory;
        $this->affaireDir = $affaireDir;
        $this->slugger = $slugger;
    }

    public function upload(UploadedFile $file, $dir = null, $newFormat = false)
    {
        $originalFilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $safeFilename = $this->slugger->slug($originalFilename);
        $fileName = uniqid().'.'.$file->guessExtension();

        if ($dir == null){
            if (!file_exists($this->getTargetDirectory())) {
                mkdir($this->getTargetDirectory(), 0777, true);
            }

            $file->move($this->getTargetDirectory(), $fileName);
        }else{
            if (!file_exists($dir) ){
                mkdir($dir, 0777, true);
            }

            $file->move($dir, $fileName);
        }


        /*try {

        } catch (FileException $e) {
            return $error = true;
        } */

        if ($newFormat) {
            rename($this->targetDirectory.'/'.$fileName, $this->affaireDir.'/'.md5($fileName).'/'.$fileName);
        }

        return $fileName;
    }

    public function getTargetDirectory()
    {
        return $this->targetDirectory;
    }

}