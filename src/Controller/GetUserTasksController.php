<?php

namespace App\Controller;

use App\Entity\Tache;
use App\Entity\TacheUtilisateur;
use App\Entity\Utilisateur;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class GetUserTasksController
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


        return $this->entityManager->getRepository(TacheUtilisateur::class)
            ->findByUserField($user->getId());

    }

}
