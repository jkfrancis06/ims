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


        foreach ($entites as $entite){

            if ($entite->getRole() == Entites::ROLE_SOURCE || $entite->getRole() == Entites::ROLE_VICTIME){

                $doc = new \DOMDocument();
                $data = $doc->getElementsByTagName('ent');

                var_dump($data);




                /*foreach ($dom->getElementById($entite->getId()) as $p) {
                    var_dump( $p->nodeValue);
                } */
            }




        }



        exit;
       /* return $this->render('affaire_rapport/index.html.twig', [
            'controller_name' => 'AffaireRapportController',
            'affaire' =>  $affaire
        ]);*/

        $html =  $this->renderView('affaire_rapport/index.html.twig', [
            'affaire' =>  $affaire
        ]);

        return new PdfResponse(
            $knpSnappyPdf->getOutputFromHtml($html),
            'Dossier.pdf'
        );
    }
}
