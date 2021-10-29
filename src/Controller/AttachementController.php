<?php

namespace App\Controller;

use App\Entity\Attachements;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\Routing\Annotation\Route;

class AttachementController extends AbstractController
{


    /**
     * @var string
     */
    private $targetDirectory;

    /**
     * @var string
     */
    private $affaireDir;


    public function __construct(string $affaireDir, string $targetDirectory)
    {
        $this->affaireDir = $affaireDir;
        $this->targetDirectory = $targetDirectory;
    }

    /**
     * @Route("/at/download/{attachement}", name="attachement_download")
     */
    public function index(Attachements $attachement): Response
    {
        $response = new BinaryFileResponse($this->affaireDir.'/'.md5($attachement->getName()).'/'.$attachement->getName());
        $response->trustXSendfileTypeHeader();
        $response->setContentDisposition(
            ResponseHeaderBag::DISPOSITION_INLINE,
            $attachement->getName(),
            iconv('UTF-8', 'ASCII//TRANSLIT', $attachement->getName())
        );

        return $response;
    }

    /**
     * @Route("/at/file-download/{file}", name="file_download")
     */
    public function fileDownload($file): Response
    {
        $response = new BinaryFileResponse($this->affaireDir.'/'.md5($file).'/'.$file);
        $response->trustXSendfileTypeHeader();
        $response->setContentDisposition(
            ResponseHeaderBag::DISPOSITION_INLINE,
            $file,
            iconv('UTF-8', 'ASCII//TRANSLIT', $file)
        );

        return $response;
    }
}
