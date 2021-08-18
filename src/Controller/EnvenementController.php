<?php

namespace App\Controller;

use App\Entity\Affaire;
use App\Entity\Attachements;
use App\Entity\Envenement;
use App\Form\EnvenementType;
use App\Service\FileUploader;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class EnvenementController extends AbstractController
{
    /**
     * @Route("/affaire/{id}/ev/c", name="envenement_create")
     */
    public function index($id, Request $request,FileUploader $fileUploader): Response
    {

        $affaire = $this->getDoctrine()->getManager()->getRepository(Affaire::class)->find($id);

        if ($affaire == null){
            throw new NotFoundHttpException("Non trouve");
        }

        $envenement = new Envenement();

        $envenementForm = $this->createForm(EnvenementType::class,$envenement);

        $envenementForm->handleRequest($request);

        if($envenementForm->isSubmitted() && $envenementForm->isValid()){

            $formAttachements = $envenementForm->get('attachements')->getData();
            foreach ($formAttachements as $formAttachement){
                $fileName = $fileUploader->upload($formAttachement);
                $attachement = new Attachements();
                $attachement->setName($fileName);
                $attachement->setType(1);
                $attachement->setDescription(pathinfo($fileName, PATHINFO_EXTENSION));
                $envenement->addAttachement($attachement);
            }
            $envenement->setAffaire($affaire);

            //var_dump($personne->getTelephone()->toArray());
            $em = $this->getDoctrine()->getManager();
            $em->persist($envenement);
            $em->flush();
            $request->getSession()->getFlashBag()->add('create_evenement', 'L\'evenement a été crée avec succès');
            return $this->redirectToRoute('affaire_details', array('id' => $affaire->getId()));

        }

        return $this->render('envenement/index.html.twig', [
            'controller_name' => 'EnvenementController',
            'active' => 'affaire',
            'envenementForm' => $envenementForm->createView(),
        ]);
    }
}
