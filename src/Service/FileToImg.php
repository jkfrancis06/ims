<?php

namespace App\Service;

use App\Entity\PieceJointe;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Spatie\PdfToImage\Pdf;

class FileToImg
{

    /**
     * @var string
     */
    private $projectDir;

    /**
     * @var string
     */
    private $courrierDir;

    /**
     * @var string
     */
    private $affaireDir;


    /**
     * @var string
     */
    private $targetDirectory;

    private $entityManager;

    public function __construct(string $projectDir, string $courrierDir, string  $affaireDir, string $targetDirectory, EntityManagerInterface $entityManager)
    {
        $this->projectDir = $projectDir;
        $this->courrierDir = $courrierDir;
        $this->affaireDir = $affaireDir;
        $this->targetDirectory = $targetDirectory;
        $this->entityManager = $entityManager;
    }



    public function convert(PieceJointe $piece) {

        if (file_exists($this->courrierDir.'/'.md5($piece->getCourrier()->getEntry()).'/'.$piece->getFilename())) {

            $pdf = new Pdf($this->courrierDir.'/'.md5($piece->getCourrier()->getEntry()).'/'.$piece->getFilename());

            $pdf->setOutputFormat('png');

            $pdf->setResolution(300);

            $pdf->setCompressionQuality(100);

            mkdir($this->courrierDir.'/'.md5($piece->getFilename()));

            $dir = $this->courrierDir.'/'.md5($piece->getFilename());

            $pdf->saveAllPagesAsImages($dir);

        }

    }


}