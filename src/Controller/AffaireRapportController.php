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


        $entites = $affaire->getEntites();

        $evenements = $affaire->getEnvenements();

        //$pattern = '/\[\[[^}]*\]\]/';

        foreach ($entites as $key => $entite) {

            //preg_match_all('/\[{2}(.*?)\]{2}/is',$entite->getResume(),$match);

            $text = preg_replace('/\[{2}(.*?)\]{2}/is' , 'XXXXXXXXXXXXX', $entite->getResume());


            $entites[$key]->setResume($text);


        }

        foreach ($evenements as $key => $evenement) {

            //preg_match_all('/\[{2}(.*?)\]{2}/is',$entite->getResume(),$match);

            $text = preg_replace('/\[{2}(.*?)\]{2}/is' , 'XXXXXXXXXXXXX', $evenement->getResume());


            $evenements[$key]->setResume($text);


        }


       /*return $this->render('affaire_rapport/index.html.twig', [
            'controller_name' => 'AffaireRapportController',
            'affaire' =>  $affaire
        ]); */

        $html =  $this->renderView('affaire_rapport/index.html.twig', [
            'affaire' =>  $affaire
        ]);

        $footer = $this->renderView('affaire_rapport/confidentiel.html.twig');

        $pdfOptions = array(
            'footer-font-size' => '10',
            'page-size'        => 'A4',
            'orientation'      => 'Portrait',
            'margin-top'       => 20,
            'margin-bottom'    => 20,
            'margin-left'      => 15,
            'margin-right'     => 15,
            'footer-html' => $footer,
            'header-html' => $footer,
        );

        $knpSnappyPdf->setOption('footer-right', '[page]');


        return new PdfResponse(
            $knpSnappyPdf->getOutputFromHtml($html, $pdfOptions),
            "Dossier.pdf"
        );
    }
}
