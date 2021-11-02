<?php

namespace App\Controller;

use App\Entity\Affaire;
use App\Entity\Entites;
use App\Entity\Personne;
use App\Entity\Vehicule;
use Knp\Bundle\SnappyBundle\Snappy\Response\PdfResponse;
use Knp\Snappy\Pdf;
use PHPHtmlParser\Dom;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AffaireRapportController extends AbstractController
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
     * @Route("/affaire/rapport/{id}", name="affaire_rapport")
     */
    public function index($id, Pdf $knpSnappyPdf): Response
    {


        $affaire = $this->getDoctrine()->getManager()->getRepository(Affaire::class)->find($id);


        $entites = $affaire->getEntites();

        $evenements = $affaire->getEnvenements();

        $pattern = '/\[{2}(.*?)\]{2}/is';


        foreach ($entites as $key => $entite) {

            //preg_match_all('/\[{2}(.*?)\]{2}/is',$entite->getResume(),$match);

            // if ($entite->getRole() == Entites::ROLE_SOURCE) {}

            $entites[$key] = $this->hideSensitiveInformations($entite);


            var_dump($entites[$key]->getMainPicture());
            var_dump(md5($entites[$key]->getMainPicture()));

            /*$entites[$key]->setBase64data(
                base64_encode(
                    file_get_contents(
                        $this->affaireDir.'/'.md5($entites[$key]->getMainPicture()).'/'.$entites[$key]->getMainPicture()
                    )
                )
            );


            foreach ($entite->getAttachements() as $attachement) {
                $attachement->setBase64data(
                    base64_encode(
                        file_get_contents(
                            $this->affaireDir.'/'.md5($attachement->getName()).'/'.$attachement->getName()
                        )
                    )
                );
            }*/

        }
        exit;

        foreach ($evenements as $key => $evenement) {

            //preg_match_all('/\[{2}(.*?)\]{2}/is',$entite->getResume(),$match);

            $text = preg_replace('/\[{2}(.*?)\]{2}/is' , 'XXXXXXXXXXXXX', $evenement->getResume());

            $resume = $evenement->getResume();

            $value = preg_replace_callback($pattern,function ($matches){

                $string = str_replace(array('[[',']]'),'',$matches[0]);

                $entite = $this->getDoctrine()->getManager()->getRepository(Entites::class)->find(intval($string));


                if ($entite == null){
                    return $matches[0];
                }else{
                    if ($entite->getRole() == Entites::ROLE_SOURCE) {
                        return "[ XXXXXXXXXXXXXX ]";
                    }else if ($entite instanceof Personne){
                        return '['.$entite->getDescription().' '.$entite->getDescription().']';
                    }else {
                        return '['.$entite->getDescription().' '.$entite->getDescription().']';
                    }
                }
            },$resume);

            $evenement->setResume($value);

            $eventEntites = $evenement->getEntite();

            foreach ($eventEntites as $entite) {

                $eventEntites[$key] = $this->hideSensitiveInformations($entite);

            }

            foreach ($evenement->getAttachements() as $attachement) {
                $attachement->setBase64data(
                    base64_encode(
                        file_get_contents(
                            $this->affaireDir.'/'.md5($attachement->getName()).'/'.$attachement->getName()
                        )
                    )
                );
            }

        }


       return $this->render('affaire_rapport/index.html.twig', [
            'controller_name' => 'AffaireRapportController',
            'affaire' =>  $affaire
        ]);

        $html =  $this->renderView('affaire_rapport/index.html.twig', [
            'affaire' =>  $affaire
        ]);

        $header = $this->renderView('affaire_rapport/confidentiel.html.twig');
        $footer = $this->renderView('affaire_rapport/confidentiel-footer.html.twig', [
            'affaire' =>  $affaire
        ]);

        $pdfOptions = array(
            'footer-font-size' => '10',
            'page-size'        => 'A4',
            'orientation'      => 'Portrait',
            'margin-top'       => 20,
            'margin-bottom'    => 20,
            'margin-left'      => 15,
            'margin-right'     => 15,
            'footer-html' => $footer,
            'header-html' => $header,
        );


        $knpSnappyPdf->setOption('footer-right', '[page]');
       // $knpSnappyPdf->setOption('enable-local-file-access', 'None');
       // $knpSnappyPdf->setOption('load-error-handling', 'ignore');


        $knpSnappyPdf->setTimeout(3000);




        return new PdfResponse(
            $knpSnappyPdf->getOutputFromHtml($html, $pdfOptions),
            "Dossier.pdf"
        );
    }

    private function hideSensitiveInformations(Entites $entite) {

        $pattern = '/\[{2}(.*?)\]{2}/is';

        /*
             * Edit resume content
             */
        $resume = $entite->getResume();

        $value = preg_replace_callback($pattern,function ($matches){

            $string = str_replace(array('[[',']]'),'',$matches[0]);

            $entite = $this->getDoctrine()->getManager()->getRepository(Entites::class)->find(intval($string));


            if ($entite == null){
                return $matches[0];
            }else{
                if ($entite->getRole() == Entites::ROLE_SOURCE) {
                    return "[ XXXXXXXXXXXXXX ]";
                }else if ($entite instanceof Personne){
                    return '['.$entite->getDescription().' '.$entite->getDescription().']';
                }else {
                    return '['.$entite->getDescription().' '.$entite->getDescription().']';
                }
            }
        },$resume);

        $entite->setResume($value);

        if ($entite->getRole() == Entites::ROLE_SOURCE) {

            if ($entite instanceof Personne){
                $entite->setNom('XXXXXXXXXXXXXXXXXXXX');
                $entite->setPrenom('XXXXXXXXXXXXXXXXXXX');

                foreach ($entite->getAliases() as $alias){
                    $alias->setAlias('XXXXXXXXXXXXXXXXXXX');
                }

                foreach ($entite->getTelephone() as $telephone){
                    $telephone->setNumero('XXXXXXXXXXXXXXXXXXX');
                }

                $entite->setSexe('XXXXXXXXXXXXXXXXXX');

                $entite->setDateNaissance(null);

                $entite->setLieuNaissance('XXXXXXXXXXXXXXXXXX');

                $entite->setNumCarte('XXXXXXXXXXXXXXXXXX');

                $entite->setNumPassport('XXXXXXXXXXXXXXXXXX');

                $entite->setTaille(0);

                $entite->setSituationMatri(Personne::SIT_IND);

                $entite->setAdresse('XXXXXXXXXXXXXXXXXXXXXX');

            }

            if ($entite instanceof Vehicule){
                $entite->setCat('XXXXXXXXXXXXXXXXXXXX');
                $entite->setImmatriculation('XXXXXXXXXXXXXXXXXXX');
            }


            $entite->setMainPicture("icon-default.png");


            $entite->setResume('XXXXXXXXXXXXXXXXXX');


            $entite->setOtherInfos('XXXXXXXXXXXXXXXXXXXX');

        }


        return $entite;



    }

}
