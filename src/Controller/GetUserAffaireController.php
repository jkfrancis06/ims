<?php

namespace App\Controller;

use App\Entity\Affaire;
use App\Entity\AffaireUtilisateur;
use App\Entity\Tache;
use App\Entity\TacheUtilisateur;
use App\Entity\Utilisateur;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class GetUserAffaireController
{

    /** @var  TokenStorageInterface */
    private $tokenStorage;
    private $entityManager;

    public function __construct( TokenStorageInterface $storage ,EntityManagerInterface $entityManager){
        $this->tokenStorage = $storage;
        $this->entityManager = $entityManager;

    }

    public function __invoke(Request $request){

        $token = $this->tokenStorage->getToken();
        $user = $token->getUser();

        $affaireUtilisateurs = $this->entityManager->getRepository(AffaireUtilisateur::class)->findBy([
            'utilisateur' => $user
        ]);

        $affaire_array = [];

        foreach ($affaireUtilisateurs as $affaireUtilisateur){
            array_push($affaire_array,$affaireUtilisateur->getAffaire());
        }

        return $affaire_array;

    }

}
