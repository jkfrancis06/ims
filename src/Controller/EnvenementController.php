<?php

namespace App\Controller;

use App\Entity\Affaire;
use App\Entity\Attachements;
use App\Entity\Envenement;
use App\Form\EnvenementType;
use App\Service\FileUploader;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormError;
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

        if ($envenementForm->isSubmitted()){  // si la date de fin est inferieure a la date de debut generer une erreur de formulaure
            if ($envenementForm->get('endAt')->getData() != null){
                $start = $envenementForm->get('startAt')->getData()->getTimeStamp();
                $end = $envenementForm->get('endAt')->getData()->getTimeStamp();
                if ($start > $end){
                    $fileError = new FormError("La date de debut ne doit pas etre superieure a la date de fin");
                    $envenementForm->get('endAt')->addError($fileError);
                }
            }

        }



        if($envenementForm->isSubmitted() && $envenementForm->isValid()){

            $formAttachements = $envenement->getAttachements();

            if ($formAttachements != null) {

                foreach ($formAttachements as $formAttachement){


                    if ($formAttachement->getFile() != null) {

                        $fileName = $fileUploader->upload($formAttachement->getFile());

                        $formAttachement->setName($fileName);

                        $formAttachement->setType(1);

                        $formAttachement->setEnvenement($envenement);
                    }
                }
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
            'entites' => $affaire->getEntites(),
            'envenementForm' => $envenementForm->createView(),
        ]);
    }




    /**
     * @Route("/affaire/{id}/e/{event_id}", name="envenement_edit")
     */
    public function editEvent ($id, $event_id, Request $request,FileUploader $fileUploader): Response
    {

        $affaire = $this->getDoctrine()->getManager()->getRepository(Affaire::class)->find($id);
        $envenement = $this->getDoctrine()->getManager()->getRepository(Envenement::class)->find($event_id);

        if ($affaire == null || $envenement == null){
            throw new NotFoundHttpException("Non trouve");
        }


        $envenementForm = $this->createForm(EnvenementType::class,$envenement);

        $envenementForm->handleRequest($request);

        if ($envenementForm->isSubmitted()){  // si la date de fin est inferieure a la date de debut generer une erreur de formulaure
            if ($envenementForm->get('endAt')->getData() != null){
                $start = $envenementForm->get('startAt')->getData()->getTimeStamp();
                $end = $envenementForm->get('endAt')->getData()->getTimeStamp();
                if ($start > $end){
                    $fileError = new FormError("La date de debut ne doit pas etre superieure a la date de fin");
                    $envenementForm->get('endAt')->addError($fileError);
                }
            }

        }

        if($envenementForm->isSubmitted() && $envenementForm->isValid()){


            $formAttachements = $envenement->getAttachements();

            if ($formAttachements != null) {

                foreach ($formAttachements as $formAttachement){


                    if ($formAttachement->getFile() != null) {

                        $fileName = $fileUploader->upload($formAttachement->getFile());

                        $formAttachement->setName($fileName);

                    }
                }
            }


            $em = $this->getDoctrine()->getManager();

            $em->flush();

            $request->getSession()->getFlashBag()->add('edit_evenement', 'L\'evenement a été crée modifie succès');
            return $this->redirectToRoute('affaire_details', array('id' => $affaire->getId()));

        }

        return $this->render('envenement/edit.html.twig', [
            'controller_name' => 'EnvenementController',
            'active' => 'affaire',
            'envenement' => $envenement,
            'entites' => $affaire->getEntites(),
            'envenementForm' => $envenementForm->createView(),
        ]);
    }


    /**
     * @Route("/envenement/d/{id}", name="delete_event")
     */
    public function deleteEvent($id,Request $request)
    {
        $event = $this->getDoctrine()->getManager()->getRepository(Envenement::class)->find($id);
        if ($event != null){
            $affaire_id = $event->getAffaire()->getId();
            $em = $this->getDoctrine()->getManager();
            $em->remove($event);
            $em->flush();
            $request->getSession()->getFlashBag()->add('delete_event', 'L\'evenement a été supprime avec succès');
            return $this->redirectToRoute('affaire_details', array('id' => $affaire_id));
        }else{
            return $this->redirectToRoute('dashboard');
        }

    }
}
