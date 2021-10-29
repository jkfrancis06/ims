<?php

namespace App\Controller;

use App\Entity\Affaire;
use App\Entity\AffaireUtilisateur;
use App\Entity\Entites;
use App\Entity\Tache;
use App\Entity\TacheUtilisateur;
use App\Entity\Utilisateur;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class GetAffaireEntiteController
{

    /** @var  TokenStorageInterface */
    private $tokenStorage;
    private $entityManager;

    public function __construct( TokenStorageInterface $storage ,EntityManagerInterface $entityManager){
        $this->tokenStorage = $storage;
        $this->entityManager = $entityManager;

    }

    public function __invoke($id,Request $request){

        $json_data = $request->getContent();
        $data = json_decode($json_data,true);


        $token = $this->tokenStorage->getToken();
        $user = $token->getUser();

        $entites = $this->entityManager->getRepository(Entites::class)->findBy([
            'affaire' => $id
        ]);


        return $entites;

    }

}
