<?php


namespace App\Controller;

use App\Entity\AffaireUtilisateur;
use App\Entity\CanConsult;
use App\Entity\Entites;
use App\Entity\Utilisateur;
use App\Entity\Vehicule;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
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

        $utilisateurAffaires = $this->getDoctrine()->getManager()->getRepository(AffaireUtilisateur::class)->findAll();
        $em = $this->getDoctrine()->getManager();
        foreach ($utilisateurAffaires as $utilisateurAffaire){
            $utilisateur = $utilisateurAffaire->getUtilisateur();
            $role = $utilisateur->getRoles();
            if (!in_array('USER_OWN_AFF',$role)){
                array_push($role, 'USER_OWN_AFF');
                var_dump($role);
                $utilisateur->setRoles($role);
                $em->flush();
            }
        }

        return new JsonResponse('$temp',200);

    }

}