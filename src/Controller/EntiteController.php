<?php

namespace App\Controller;

use App\Entity\Affaire;
use App\Entity\Attachements;
use App\Entity\Entites;
use App\Entity\Fichier;
use App\Entity\Organisation;
use App\Entity\Personne;
use App\Entity\Telephone;
use App\Entity\Vehicule;
use App\Form\OrganisationType;
use App\Form\PersonneType;
use App\Form\VehiculeType;
use App\Service\FileUploader;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class EntiteController extends AbstractController
{
    /**
     * @Route("/affaire/{id}/ec/{type}", name="create_entite")
     */
    public function index($id, $type, Request $request,FileUploader $fileUploader): Response
    {

        $affaire = $this->getDoctrine()->getManager()->getRepository(Affaire::class)->find($id);

        if ($affaire == null){
            throw new NotFoundHttpException('Non trouve');
        }

        $personne = new Personne();
        $vehicule = new Vehicule();
        $organisation = new Organisation();
        $telephone = new Telephone();

        $personneForm = $this->createForm(PersonneType::class,$personne);
        $vehiculeForm = $this->createForm(VehiculeType::class,$vehicule);
        $organisationForm = $this->createForm(OrganisationType::class, $organisation);

        $personneForm->handleRequest($request);
        $vehiculeForm->handleRequest($request);
        $organisationForm->handleRequest($request);

        if ($personneForm->isSubmitted()){


            /*$mainPicture = $personneForm->get('telephone')[0]->get('fichierCdr')->getData();

            var_dump($mainPicture); */

        }

        if ($personneForm->isSubmitted() && $personneForm->isValid()){

            $i = 0;
            foreach ($personne->getTelephone() as $telephone){
                $fichierCdr = $personneForm->get('telephone')[$i]->get('fichierCdr')->getData();
                $fileName = $fileUploader->upload($fichierCdr);
                $telephone->setFichierCdr($fileName);
                $i++;
            }


            $mainPicture = $personneForm->get('mainPicture')->getData();
            $mainPictureFileName = $fileUploader->upload($mainPicture);

            $personne->setMainPicture($mainPictureFileName);

            $formAttachements = $personneForm->get('attachements')->getData();
            foreach ($formAttachements as $formAttachement){
                $fileName = $fileUploader->upload($formAttachement);
                $attachement = new Attachements();
                $attachement->setName($fileName);
                $attachement->setType(1);
                $attachement->setDescription(pathinfo($fileName, PATHINFO_EXTENSION));
                $personne->addAttachement($attachement);
            }
            $personne->setDescription($personne->getNom());
            $personne->setDescription2($personne->getPrenom());
            $personne->setAffaire($affaire);

            //var_dump($personne->getTelephone()->toArray());
            $em = $this->getDoctrine()->getManager();
            $em->persist($personne);
            $em->flush();
            $request->getSession()->getFlashBag()->add('create_personne', 'L\'element a été crée avec succès');
            return $this->redirectToRoute('affaire_details', array('id' => $affaire->getId()));
        }


        if ($vehiculeForm->isSubmitted() && $vehiculeForm->isValid()){

            $mainPicture = $vehiculeForm->get('mainPicture')->getData();
            $mainPictureFileName = $fileUploader->upload($mainPicture);

            $vehicule->setMainPicture($mainPictureFileName);

            $formAttachements = $vehiculeForm->get('attachements')->getData();
            foreach ($formAttachements as $formAttachement){
                $fileName = $fileUploader->upload($formAttachement);
                $attachement = new Attachements();
                $attachement->setName($fileName);
                $attachement->setType(1);
                $attachement->setDescription(pathinfo($fileName, PATHINFO_EXTENSION));
                $vehicule->addAttachement($attachement);
            }
            $vehicule->setAffaire($affaire);
            //var_dump($personne->getTelephone()->toArray());
            $em = $this->getDoctrine()->getManager();
            $em->persist($vehicule);
            $em->flush();
            $request->getSession()->getFlashBag()->add('create_vehicule', 'L\'element a été crée avec succès');
            return $this->redirectToRoute('affaire_details', array('id' => $affaire->getId()));
        }


        if ($organisationForm->isSubmitted() && $organisationForm->isValid()){

            $mainPicture = $organisationForm->get('mainPicture')->getData();
            $mainPictureFileName = $fileUploader->upload($mainPicture);

            $organisation->setMainPicture($mainPictureFileName);

            $formAttachements = $organisationForm->get('attachements')->getData();
            foreach ($formAttachements as $formAttachement){
                $fileName = $fileUploader->upload($formAttachement);
                $attachement = new Attachements();
                $attachement->setName($fileName);
                $attachement->setType(1);
                $attachement->setDescription(pathinfo($fileName, PATHINFO_EXTENSION));
                $organisation->addAttachement($attachement);
            }
            $organisation->setAffaire($affaire);
            //var_dump($personne->getTelephone()->toArray());
            $em = $this->getDoctrine()->getManager();
            $em->persist($organisation);
            $em->flush();
            $request->getSession()->getFlashBag()->add('create_organisation', 'L\'element a été crée avec succès');
            return $this->redirectToRoute('affaire_details', array('id' => $affaire->getId()));
        }


        if ($type != 1 && $type != 2 && $type != 3 ) {  // personne
            return $this->redirectToRoute('dashboard');
        }

        $entitesList = $this->getDoctrine()->getManager()->getRepository(Entites::class)->findBy([
           'affaire' => $affaire
        ]);


        return $this->render('entite/create.html.twig', [
            'controller_name' => 'EntiteController',
            'active' => 'affaire',
            'type' => $type,
            'entites' => $entitesList,
            'personneForm' => $personneForm->createView(),
            'vehiculeForm' => $vehiculeForm->createView(),
            'organisationForm' => $organisationForm->createView(),
        ]);
    }

}
