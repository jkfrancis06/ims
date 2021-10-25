<?php

namespace App\Controller;

use App\Entity\Affaire;
use App\Entity\Entites;
use Knp\Bundle\SnappyBundle\Snappy\Response\PdfResponse;
use Knp\Snappy\Pdf;
use PHPHtmlParser\Dom;
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


        $sentence = $affaire->getResume();

        $dom = new Dom();

        $entites = $affaire->getEntites();


       /* return $this->render('affaire_rapport/index.html.twig', [
            'controller_name' => 'AffaireRapportController',
            'affaire' =>  $affaire
        ]);*/

        $html =  $this->renderView('affaire_rapport/index.html.twig', [
            'affaire' =>  $affaire
        ]);

        $footer = $this->renderView('affaire_rapport/confidentiel.html.twig');

        $knpSnappyPdf->setOption('footer-right', '[page]');


        $knp = new PdfResponse(
            $knpSnappyPdf->getOutputFromHtml($html)
        );



        return $knp;
    }
}
