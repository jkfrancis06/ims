<?php

namespace App\Controller;

use App\Entity\Affaire;
use App\Entity\AffaireUtilisateur;
use App\Entity\Utilisateur;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class CreateBulkAffaireUtilisateursController
{
    /** @var  TokenStorageInterface */
    private $tokenStorage;
    private $entityManager;

    public function __construct( TokenStorageInterface $storage ,EntityManagerInterface $entityManager){
        $this->tokenStorage = $storage;
        $this->entityManager = $entityManager;

    }

    public function __invoke(Request $request){

        $json_data = $request->getContent();
        $data = json_decode($json_data,true);

        $users = $data["utilisateurs"];

        $affaire = $this->entityManager->getRepository(Affaire::class)->find($data["affaire"]);

        foreach ($users as $user){
            $affaireUtilisateur = new AffaireUtilisateur();
            $affaireUtilisateur->setAffaire($affaire);
            $affaireUtilisateur->setUtilisateur($this->entityManager->getRepository(Utilisateur::class)->find($user));
            $this->entityManager->persist($affaireUtilisateur);
            $this->entityManager->flush();
        }

        return $this->entityManager->getRepository(Affaire::class)->findAll();

    }
}
