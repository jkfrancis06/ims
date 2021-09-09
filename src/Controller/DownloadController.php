<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\Routing\Annotation\Route;


class DownloadController extends AbstractController
{

    /**
     * @var string
     */
    private $projectDir;

    /**
     * @var string
     */
    private $courrierDir;

    public function __construct(string $projectDir, string $courrierDir)
    {
        $this->projectDir = $projectDir;
        $this->courrierDir = $courrierDir;
    }


    /**
     * @Route("/c/download/{name}", name="download")
     */
    public function index($name): Response
    {
        $response = new BinaryFileResponse($this->courrierDir.'/'.$name);
        $response->trustXSendfileTypeHeader();
        $response->setContentDisposition(
            ResponseHeaderBag::DISPOSITION_INLINE,
            $name,
            iconv('UTF-8', 'ASCII//TRANSLIT', $name)
        );

        return $response;
    }
}
