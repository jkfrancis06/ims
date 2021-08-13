<?php

namespace App\Controller;

use App\Entity\Affaire;
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



       return $this->render('affaire_rapport/index.html.twig', [
            'controller_name' => 'AffaireRapportController',
            'affaire' =>  $affaire
        ]);

        /* $html =  $this->renderView('affaire_rapport/index.html.twig', [
            'affaire' =>  $affaire
        ]);

        return new PdfResponse(
            $knpSnappyPdf->getOutputFromHtml($html),
            'Dossier.pdf'
        );*/
    }
}
