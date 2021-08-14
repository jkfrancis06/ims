<?php


namespace App\Controller;

use App\Entity\AffaireUtilisateur;
use App\Entity\Attachements;
use App\Entity\CanConsult;
use App\Entity\Entites;
use App\Entity\Envenement;
use App\Entity\Preuve;
use App\Entity\Utilisateur;
use App\Entity\Vehicule;
use App\Service\FileUploader;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\User\User;


class UploadController extends \Symfony\Bundle\FrameworkBundle\Controller\AbstractController
{

    /** @var  TokenStorageInterface */
    private $tokenStorage;
    private  $fileUploader;

    public function __construct( TokenStorageInterface $storage, FileUploader $fileUploader){
        $this->tokenStorage = $storage;
        $this->fileUploader = $fileUploader;
    }

    /**
     * @Route("/api/personne-file/upload", name="upload")
     *
     */

    public function createUserAction(Request $request){

        $token = $this->tokenStorage->getToken();
        $user = $token->getUser();

        /** @var UploadedFile $uploadedFile */
        $uploadedFile = $request->files->get('file');

        $file_array = [];
        foreach ($uploadedFile as $file){
            array_push($file_array,$this->fileUploader->upload($file));
        }


        return new JsonResponse($file_array,200);

    }


    /**
     * @Route("/personne-file/upload")
     *
     */

    public function update(Request $request){



        /** @var UploadedFile $uploadedFile */
        $uploadedFile = $request->files->get('file');

        $file_array = [];

        $entite = $this->getDoctrine()->getManager()->getRepository(Envenement::class)->find(6);



        foreach ($uploadedFile as $file){


            $name = $this->fileUploader->upload($file);

            $file = new Preuve();

            $file->setNom($name);

            $file->setDescription($name);
            $file->setFiles($name);


            $file->setCreatedAt(new \DateTime());

            $entite->addPreuve($file);

            array_push($file_array,$name);

            $em = $this->getDoctrine()->getManager();

            $em->flush();
        }


        return new JsonResponse($file_array,200);

    }

}