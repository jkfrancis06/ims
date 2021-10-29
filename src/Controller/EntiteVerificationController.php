<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EntiteVerificationController extends AbstractController
{
    /**
     * @Route("/api/check-entite", name="entite_verification")
     */
    public function index(Request $request): Response
    {
        $json_data = $request->getContent();
        $data = json_decode($json_data,true);



    }
}
