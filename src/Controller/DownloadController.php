<?php

namespace App\Controller;

use App\Entity\Attachements;
use App\Entity\Courrier;
use App\Entity\Entites;
use App\Entity\PieceJointe;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
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

    /**
     * @var string
     */
    private $affaireDir;


    /**
     * @var string
     */
    private $targetDirectory;

    public function __construct(string $projectDir, string $courrierDir, string  $affaireDir, string $targetDirectory)
    {
        $this->projectDir = $projectDir;
        $this->courrierDir = $courrierDir;
        $this->affaireDir = $affaireDir;
        $this->targetDirectory = $targetDirectory;
    }


    /**
     * @Route("/c/download/{name}/{entry}", name="download")
     */
    public function index($name,$entry): Response
    {
        $response = new BinaryFileResponse($this->courrierDir.'/'.md5($entry).'/'.$name);
        $response->trustXSendfileTypeHeader();
        $response->setContentDisposition(
            ResponseHeaderBag::DISPOSITION_INLINE,
            $name,
            iconv('UTF-8', 'ASCII//TRANSLIT', $name)
        );

        return $response;
    }

    /**
     * @Route("/c/xhr-show", name="xhr_show_image")
     */
    public function xhrShowImage(Request $request):Response
    {

        $json_data = $request->getContent();

        $data = json_decode($json_data,true);

        $output = [];

        if (isset($data['piece_id']) && $data['piece_id'] != null){

            $piece_id = intval($data['piece_id']);

            $piece = $this->getDoctrine()->getManager()->getRepository(PieceJointe::class)->find($piece_id);

            if ($piece != null) {

                /*
                 * Check if base 64 files are already created
                 */

                $targetDir = $this->courrierDir.'/'.md5($piece->getCourrier()->getEntry()).'/base64';

                if (!file_exists($targetDir)) {

                    mkdir($this->courrierDir.'/'.md5($piece->getCourrier()->getEntry()).'/base64', 0777, true);

                    $im = new \Imagick($this->courrierDir.'/'.md5($piece->getCourrier()->getEntry()).'/'.$piece->getFilename()) ;

                    $pages = $im->getNumberImages();

                    $imagick = new \Imagick();

                    $imagick->readImage($this->courrierDir.'/'.md5($piece->getCourrier()->getEntry()).'/'.$piece->getFilename());

                    $imagick->setImageFormat('jpg');

                    foreach($imagick as $i=>$imagick) {

                        $path = $targetDir.'/'.($i+1).".jpg";

                        $imagick->writeImage($path);

                        $data = file_get_contents($path);

                        array_push($output,base64_encode($data));
                    }
                    $imagick->clear();

                }elseif ($this->is_dir_empty($targetDir)){

                    $im = new \Imagick($this->courrierDir.'/'.md5($piece->getCourrier()->getEntry()).'/'.$piece->getFilename()) ;

                    $pages = $im->getNumberImages();

                    $imagick = new \Imagick();


                    $imagick->readImage($this->courrierDir.'/'.md5($piece->getCourrier()->getEntry()).'/'.$piece->getFilename());

                    $imagick->setImageFormat('jpg');

                    foreach($imagick as $i=>$imagick) {

                        $path = $targetDir.'/'.($i+1).".jpg";

                        $imagick->writeImage($path);

                        $data = file_get_contents($path);

                        array_push($output,base64_encode($data));
                    }
                    $imagick->clear();

                }else{

                    $files = scandir($targetDir);

                    foreach ($files as $file){


                        if (pathinfo($targetDir.'/'.$file,PATHINFO_EXTENSION) == 'jpg'){

                            $path = $targetDir.'/'.$file;
                            $data = file_get_contents($path);
                            array_push($output,base64_encode($data));
                        }
                    }


                }



            }

        }

        return new JsonResponse($output);

    }


    /**
     * @Route("/cour")
     */
    public function cpour(): Response
    {

        $courriers = $this->getDoctrine()->getManager()->getRepository(Courrier::class)->findAll();

        foreach ($courriers as $courrier){

            $courrier->setEntry(uniqid('entry_', true));

            $em = $this->getDoctrine()->getManager();

            $em->flush();


        }

        return new Response('ok');
    }


    /**
     * @Route("/ddm", name="dm")
     */
    public function dummy(): Response
    {


        mkdir($this->affaireDir);

        $attachements = $this->getDoctrine()->getManager()->getRepository(Attachements::class)->findAll();

        foreach ($attachements as $courrier){

           // $pieces = $courrier->getPiecejointe();


            mkdir($this->affaireDir.'/'.md5($courrier->getName()));

            rename($this->targetDirectory.'/'.$courrier->getName(), $this->affaireDir.'/'.md5($courrier->getName()).'/'.$courrier->getName());

        }

        return new Response('ok');
    }



    /**
     * @Route("/ddm2", name="dm2")
     */
    public function dummy2(): Response
    {


        $attachements = $this->getDoctrine()->getManager()->getRepository(Entites::class)->findAll();

        foreach ($attachements as $courrier){

            // $pieces = $courrier->getPiecejointe();

            if (!file_exists($this->affaireDir.'/'.md5($courrier->getMainPicture()))) {

                mkdir($this->affaireDir.'/'.md5($courrier->getMainPicture()));

                rename($this->targetDirectory.'/'.$courrier->getMainPicture(), $this->affaireDir.'/'.md5($courrier->getMainPicture()).'/'.$courrier->getMainPicture());
            }


        }

        return new Response('ok');
    }






    /**
     * @Route("/t/test/{name}", name="test_image")
     */
    public function testPdfToImage($name)
    {



        $im = new \Imagick($this->courrierDir.'/'.$name) ;
        $pages = $im->getNumberImages();
        if ($pages < 3) {
            $resolution = 600; } else { $resolution = floor(sqrt(1000000/$pages));
        }
        $imagick = new \Imagick();
        $imagick->setResolution($resolution, $resolution);
        $imagick->readImage($this->courrierDir.'/'.$name);
        $imagick->setImageFormat('jpg');
        foreach($imagick as $i=>$imagick) {

            $imagick->writeImage($this->courrierDir.'/'.$name. " page ". ($i+1) ." of ".  $pages.".jpg");
        }
        $imagick->clear();

        return 'ok';
    }


    function is_dir_empty($dir) {
        if (!is_readable($dir)) return null;
        return (count(scandir($dir)) == 2);
    }

}
