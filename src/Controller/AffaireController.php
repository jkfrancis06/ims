<?php

namespace App\Controller;

use App\Entity\Affaire;
use App\Entity\AffaireUtilisateur;
use App\Entity\CanConsult;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
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

        $affaireConsults = $this->getDoctrine()->getManager()->getRepository(CanConsult::class)->findBy([
            'utilisateur' => $user,
            'statut' => CanConsult::CONSULT_VALID
        ]);

        return $this->render('affaire/index.html.twig', [
            'controller_name' => 'AffaireController',
            'user' => $user,
            'active' => "affaire",
            'affairesUtilisateur' => $affairesUtilisateur,
            'consultations' => $affaireConsults,
        ]);
    }



    /**
     * @Route("/affaire/d/{id}", name="affaire_details")
     */
    public function affaireDetails($id): Response
    {
        $user = $this->getUser();

        $affaire = $this->getDoctrine()->getManager()->getRepository(Affaire::class)->find($id);

        if ($affaire == null){
            return new NotFoundHttpException("Element non trouve");
        }

        return $this->render('affaire/details.html.twig', [
            'controller_name' => 'AffaireController',
            'user' => $user,
            'active' => "affaire",
            'affaire' => $affaire
        ]);
    }



}
