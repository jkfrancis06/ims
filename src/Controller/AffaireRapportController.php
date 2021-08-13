<?php

namespace App\Controller;

use App\Entity\Affaire;
use App\Entity\Envenement;
use Knp\Bundle\SnappyBundle\Snappy\Response\PdfResponse;
use Knp\Snappy\Pdf;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AffaireRapportController extends AbstractController
{
    /**
     * @Route("/affaire/rapport/{id}", name="affaire_rapport")
     */
    public function index($id, Pdf $knpSnappyPdf): Response
    {


        $affaire = $this->getDoctrine()->getManager()->getRepository(Affaire::class)->find($id);

        $envenements = $this->getDoctrine()->getManager()->getRepository(Envenement::class)->findBy([
            'affaire' => $affaire
        ], [
            'startAt' => 'asc'
        ]);

       /* return $this->render('affaire_rapport/index.html.twig', [
            'controller_name' => 'AffaireRapportController',
            'affaire' =>  $affaire,
            'envenements' =>  $envenements
        ]); */

         $html =  $this->renderView('affaire_rapport/index.html.twig', [
            'affaire' =>  $affaire,
             'envenements' =>  $envenements
        ]);


        return new PdfResponse(
            $knpSnappyPdf->getOutputFromHtml($html),
            'Dossier.pdf'
        );
    }
}
