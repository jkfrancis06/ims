<?php


namespace App\Controller;

use App\Entity\Utilisateur;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
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

        $token = $this->tokenStorage->getToken();
        if ($token instanceof TokenInterface) {

            /** @var User $user */
            $user = $token->getUser();
            var_dump($user->getDepartement()->getNom());

            exit;

        } else {
            return null;
        }


    }

}