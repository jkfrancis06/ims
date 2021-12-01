<?php

namespace App\Controller\Courrier;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CourrierDashboardController extends AbstractController
{
    /**
     * @Route("/courrier/courrier/dashboard", name="courrier_courrier_dashboard")
     */
    public function index(): Response
    {
        return $this->render('courrier/courrier_dashboard/index.html.twig', [
            'controller_name' => 'CourrierDashboardController',
        ]);
    }
}
