<?php


namespace App\Controller;

use App\Entity\Affaire;
use App\Entity\AffaireDirected;
use App\Entity\AffaireUtilisateur;
use App\Entity\CanConsult;
use App\Entity\Entites;
use App\Entity\Utilisateur;
use App\Entity\Vehicule;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\User\User;


class UtilisateurController extends \Symfony\Bundle\FrameworkBundle\Controller\AbstractController
{

    /** @var  TokenStorageInterface */
    private $tokenStorage;

    public function __construct( TokenStorageInterface $storage){
        $this->tokenStorage = $storage;
    }

    /**
     * @Route("/api/user/create", name="create_user")
     *
     */

    public function createUserAction(Request $request){

        $affaires = $this->getDoctrine()->getManager()->getRepository(Affaire::class)->findAll();
        foreach ($affaires as $affaire){
            $affaireDir = new AffaireDirected();
            $affaireDir->setAffaire($affaire);
            $affaireDir->setUtilisateur($affaire->getCreatedBy());
            $affaireDir->setCreatedAt($affaire->getCreatedAt());
            $affaireDir->setLastUpdate($affaire->getCreatedAt());
            $affaireDir->setIsRevoked(false);
            $em = $this->getDoctrine()->getManager();
            $em->persist($affaireDir);
            $em->flush();
        }

        return new JsonResponse("ok",200);

    }

    /**
     * @Route("/file/get/{name}", name="get_file")
     *
     */

    public function getFileAction($name){

        $file_with_path = $this->getParameter('kernel.project_dir').'/public/upload/'.$name;
        $file = file_get_contents($file_with_path);


        $filepath = $file_with_path;
        $filename = $name;

        $response = new Response();
        $disposition = $response->headers->makeDisposition(ResponseHeaderBag::DISPOSITION_INLINE, $filename);
        $response->headers->set('Content-Disposition', $disposition);
        $response->setContent(file_get_contents($filepath));

        return $response;
    }

}