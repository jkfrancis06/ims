<?php

namespace App\Controller;

use App\Entity\AffaireUtilisateur;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AffaireController extends AbstractController
{
    /**
     * @Route("/affaire", name="affaire")
     */
    public function index(): Response
    {
        $user = $this->getUser();

        $affairesUtilisateur = $this->getDoctrine()->getManager()->getRepository(AffaireUtilisateur::class)->findBy([
           'utilisateur' => $user,
           'isRevoked' => false
        ]);

        return $this->render('affaire/index.html.twig', [
            'controller_name' => 'AffaireController',
            'user' => $user,
            'active' => "affaire",
            'affairesUtilisateur' => $affairesUtilisateur,
        ]);
    }



}
