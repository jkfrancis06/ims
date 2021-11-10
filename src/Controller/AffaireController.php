<?php

namespace App\Controller;

use App\Entity\Affaire;
use App\Entity\AffaireDirected;
use App\Entity\AffaireUtilisateur;
use App\Entity\CanConsult;
use App\Entity\Entites;
use App\Entity\Envenement;
use App\Entity\Personne;
use App\Form\AffaireType;
use App\Service\TextContentJob;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class AffaireController extends AbstractController
{
    /**
     * @Route("/affaire/a/", name="affaire", options={"label"="COMMMON_CLIENTMANAGEMENT"})
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
     * @Route("/affaire/c/", name="affaire_create")
     */
    public function createAffaire(Request $request): Response
    {

        $user = $this->getUser();

        if (!in_array('ROLE_CREATOR', $user->getRoles())){
            throw $this->createAccessDeniedException();
        }


        $affaire = new Affaire();

        $affaireForm = $this->createForm(AffaireType::class,$affaire);

        $affaireForm->handleRequest($request);

        if ($affaireForm->isSubmitted() && $affaireForm->isValid()){
            $affaire->setDepartement($user->getDepartement());

            $affaire->setCreatedBy($user);

            $em = $this->getDoctrine()->getManager();
            $em->persist($affaire);
            $em->flush();

            $affaireUtilisateur = new AffaireUtilisateur();
            $affaireUtilisateur->setAffaire($affaire);
            $affaireUtilisateur->setUtilisateur($user);
            $affaireUtilisateur->setNiveauAccreditation($affaire->getNiveauAccreditation());
            $affaireUtilisateur->setResponsability('');
            $em->persist($affaireUtilisateur);
            $em->flush();

            $affaireDirected = new AffaireDirected();
            $affaireDirected->setAffaire($affaire);
            $affaireDirected->setUtilisateur($user);
            $em->persist($affaireDirected);
            $em->flush();

            $request->getSession()->getFlashBag()->add('affaire_create', 'L\'affaire a été cree avec succès');
            return $this->redirectToRoute('affaire');
        }

        return $this->render('affaire/create.html.twig', [
            'controller_name' => 'AffaireController',
            'active' => "affaire",
            'affaireForm' => $affaireForm->createView()
        ]);
    }



    /**
     * @Route("/affaire/d/{id}", name="affaire_details")
     * @Route("/affaire/d/{id}/entite/{entite_id}", name="affaire_details_entite")
     * @Route("/affaire/d/{id}/evenement/{event_id}", name="affaire_details_event")
     */
    public function affaireDetails($id,$entite_id = null, $event_id = null, TextContentJob $contentJob): Response
    {
        $user = $this->getUser();

        $affaire = $this->getDoctrine()->getManager()->getRepository(Affaire::class)->find($id);

        $entites = $affaire->getEntites();

        $evenements = $affaire->getEnvenements();

        $pattern = '/\[{2}(.*?)\]{2}/is';

        foreach ($entites as $key => $entite) {

            $entite->setResume($contentJob->parseTextContent($entite->getResume()));


        }


        /*foreach ($evenements as $key => $evenement) {

            //preg_match_all('/\[{2}(.*?)\]{2}/is',$entite->getResume(),$match);

            $text = preg_replace('/\[{2}(.*?)\]{2}/is' , 'XXXXXXXXXXXXX', $evenement->getResume());


            $evenements[$key]->setResume($text);


        } */

        $entite = null;

        $envenement = null;

        if ($entite_id != null) {
            $entite = $this->getDoctrine()->getManager()->getRepository(Entites::class)->find($entite_id);
        }

        if ($event_id != null) {
            $envenement = $this->getDoctrine()->getManager()->getRepository(Envenement::class)->find($event_id);
        }

        if ($affaire == null){
            return new NotFoundHttpException("Element non trouve");
        }

        return $this->render('affaire/details.html.twig', [
            'controller_name' => 'AffaireController',
            'user' => $user,
            'active' => "affaire",
            'affaire' => $affaire,
            'entite' => $entite,
            'envenement' => $envenement
        ]);
    }



}
