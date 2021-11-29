<?php

namespace App\Controller;

use App\Entity\PieceJointe;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\Routing\Annotation\Route;

class AssertController extends AbstractController
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

    /**
     * @Route("/c/assert/{piece}/{file}", name="assert")
     */
    public function index(PieceJointe $piece, $file): Response
    {
        $path = $this->courrierDir.'/conv_'.md5($piece->getFilename()).'/'.$file;

        $response = new BinaryFileResponse($path);
        $response->setContentDisposition(ResponseHeaderBag::DISPOSITION_ATTACHMENT,$file);

        return $response;
    }
}
