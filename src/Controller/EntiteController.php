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
use App\Service\TextContentJob;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class EntiteController extends AbstractController
{

    /**
     * @var string
     */
    private $targetDirectory;

    /**
     * @var string
     */
    private $affaireDir;


    public function __construct(string $affaireDir, string $targetDirectory)
    {
        $this->affaireDir = $affaireDir;
        $this->targetDirectory = $targetDirectory;
    }

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

        $personneForm = $this->createForm(PersonneType::class,$personne);
        $vehiculeForm = $this->createForm(VehiculeType::class,$vehicule);
        $organisationForm = $this->createForm(OrganisationType::class, $organisation);



        $personneForm->handleRequest($request);
        $vehiculeForm->handleRequest($request);
        $organisationForm->handleRequest($request);

        //if ($personneForm->isSubmitted()){


            /*$mainPicture = $personneForm->get('telephone')[0]->get('fichierCdr')->getData();

            var_dump($mainPicture); */

       // }

        if ($personneForm->isSubmitted() && $personneForm->isValid()){
            

            $mainPicture = $personneForm->get('mainPicture')->getData();
            if ($mainPicture != null){
                $mainPictureFileName = $fileUploader->upload($mainPicture,null,true);
                $personne->setMainPicture($mainPictureFileName);
            }

            $formAttachements = $personne->getAttachements();

            if ($formAttachements != null) {
                foreach ($formAttachements as $formAttachement){


                    if ($formAttachement->getFile() != null) {

                        $fileName = $fileUploader->upload($formAttachement->getFile(),null,true);

                        $formAttachement->setName($fileName);
                        $formAttachement->setType(1);
                        $formAttachement->setEntite($personne);
                    }
                }
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

            if ($mainPicture != null){
                $mainPictureFileName = $fileUploader->upload($mainPicture,null,true);
                $vehicule->setMainPicture($mainPictureFileName);
            }

            $formAttachements = $vehicule->getAttachements();

            if ($formAttachements != null) {
                foreach ($formAttachements as $formAttachement){


                    if ($formAttachement->getFile() != null) {

                        $fileName = $fileUploader->upload($formAttachement->getFile(),null,true);

                        $formAttachement->setName($fileName);
                        $formAttachement->setType(1);
                        $formAttachement->setEntite($vehicule);
                    }
                }
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

            if ($mainPicture != null){
                $mainPictureFileName = $fileUploader->upload($mainPicture,null,true);
                $organisation->setMainPicture($mainPictureFileName);
            }

            $formAttachements = $organisation->getAttachements();

            if ($formAttachements != null) {
                foreach ($formAttachements as $formAttachement){


                    if ($formAttachement->getFile() != null) {

                        $fileName = $fileUploader->upload($formAttachement->getFile(),null,true);

                        $formAttachement->setName($fileName);
                        $formAttachement->setType(1);
                        $formAttachement->setEntite($organisation);
                    }
                }
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





    /**
     * @Route("/affaire/{id}/eu/{type}/{entite_id}", name="update_entite")
     */
    public function updateEntite($id, $type, $entite_id = null, Request $request,FileUploader $fileUploader): Response
    {
        $affaire = $this->getDoctrine()->getManager()->getRepository(Affaire::class)->find($id);

        if ($affaire == null){
            throw new NotFoundHttpException('Non trouve');
        }

        if ($entite_id == null){
            return $this->redirectToRoute('affaire_details', array('id' => $affaire->getId()));
        }else{

            $entite = $this->getDoctrine()->getManager()->getRepository(Entites::class)->find($entite_id);

            if($entite == null){
                throw new NotFoundHttpException('Non trouve');
            }

            if ($type == 1){
                $personneForm = $this->createForm(PersonneType::class,$entite);
                $personneForm->handleRequest($request);


                if ($personneForm->isSubmitted() && $personneForm->isValid()){



                    if ($personneForm->get('mainPicture')->getData() != null){  // nouvelle image
                       $mainPicture = $personneForm->get('mainPicture')->getData();
                        $mainPictureFileName = $fileUploader->upload($mainPicture,null,true);
                        $entite->setMainPicture($mainPictureFileName);
                    }



                    $formAttachements = $entite->getAttachements();

                    if ($formAttachements != null) {

                        foreach ($formAttachements as $formAttachement){


                            if ($formAttachement->getFile() != null) {

                                $fileName = $fileUploader->upload($formAttachement->getFile(),null,true);

                                $formAttachement->setName($fileName);
                                $formAttachement->setType(1);
                                $formAttachement->setEntite($entite);
                            }
                        }
                    }


                    $em = $this->getDoctrine()->getManager();
                    $em->flush();
                    $request->getSession()->getFlashBag()->add('create_personne', 'L\'element a été modifie avec succès');
                    return $this->redirectToRoute('affaire_details', array('id' => $affaire->getId()));

                }

                $entitesList = $this->getDoctrine()->getManager()->getRepository(Entites::class)->findBy([
                    'affaire' => $affaire
                ]);

                return $this->render('entite/edit.html.twig', [
                    'controller_name' => 'EntiteController',
                    'active' => 'affaire',
                    'type' => $type,
                    'entites' => $entitesList,
                    'entite' => $entite,
                    'personneForm' => $personneForm->createView(),
                ]);

            }

            if ($type == 2) {

                $vehiculeForm = $this->createForm(VehiculeType::class,$entite);
                $vehiculeForm->handleRequest($request);

                if ($vehiculeForm->isSubmitted() && $vehiculeForm->isValid()){

                    if ($vehiculeForm->get('mainPicture')->getData() != null){  // nouvelle image
                        $mainPicture = $vehiculeForm->get('mainPicture')->getData();
                        $mainPictureFileName = $fileUploader->upload($mainPicture,null,true);
                        $entite->setMainPicture($mainPictureFileName);
                    }

                    $formAttachements = $entite->getAttachements();

                    if ($formAttachements != null) {

                        foreach ($formAttachements as $formAttachement){


                            if ($formAttachement->getFile() != null) {

                                $fileName = $fileUploader->upload($formAttachement->getFile(),null,true);

                                $formAttachement->setName($fileName);
                                $formAttachement->setType(1);
                                $formAttachement->setEntite($entite);
                            }
                        }
                    }
                    $em = $this->getDoctrine()->getManager();
                    $em->flush();
                    $request->getSession()->getFlashBag()->add('create_vehicule', 'L\'element a été modifie avec succès');
                    return $this->redirectToRoute('affaire_details', array('id' => $affaire->getId()));
                }

                $entitesList = $this->getDoctrine()->getManager()->getRepository(Entites::class)->findBy([
                    'affaire' => $affaire
                ]);

                return $this->render('entite/edit.html.twig', [
                    'controller_name' => 'EntiteController',
                    'active' => 'affaire',
                    'type' => $type,
                    'entites' => $entitesList,
                    'entite' => $entite,
                    'vehiculeForm' => $vehiculeForm->createView(),
                ]);
            }

            if ($type == 3){
                $organisationForm = $this->createForm(OrganisationType::class, $entite);
                $organisationForm->handleRequest($request);

                if ($organisationForm->isSubmitted() && $organisationForm->isValid()){

                    if ($organisationForm->get('mainPicture')->getData() != null){  // nouvelle image
                        $mainPicture = $organisationForm->get('mainPicture')->getData();
                        $mainPictureFileName = $fileUploader->upload($mainPicture,null,true);
                        $entite->setMainPicture($mainPictureFileName);
                    }

                    $formAttachements = $entite->getAttachements();

                    if ($formAttachements != null) {

                        foreach ($formAttachements as $formAttachement){


                            if ($formAttachement->getFile() != null) {

                                $fileName = $fileUploader->upload($formAttachement->getFile(),null,true);

                                $formAttachement->setName($fileName);

                                $formAttachement->setType(1);

                                $formAttachement->setEntite($entite);
                            }
                        }
                    }

                    $em = $this->getDoctrine()->getManager();
                    $em->flush();
                    $request->getSession()->getFlashBag()->add('create_organisation', 'L\'element a été modifie avec succès');
                    return $this->redirectToRoute('affaire_details', array('id' => $affaire->getId()));
                }

                $entitesList = $this->getDoctrine()->getManager()->getRepository(Entites::class)->findBy([
                    'affaire' => $affaire
                ]);

                return $this->render('entite/edit.html.twig', [
                    'controller_name' => 'EntiteController',
                    'active' => 'affaire',
                    'type' => $type,
                    'entites' => $entitesList,
                    'entite' => $entite,
                    'organisationForm' => $organisationForm->createView(),
                ]);

            }

            return $this->redirectToRoute('affaire_details', array('id' => $affaire->getId()));


        }

    }

    /**
     * @Route("/entite/at/d/{id}", name="delete_entite_attachement")
     */
    public function deleteEntiteAttachement($id,Request $request)
    {
        $attachement_id = $id;

        $attachement = $this->getDoctrine()->getManager()->getRepository(Attachements::class)->find($attachement_id);
        $entite = $attachement->getEntite();
        $entite->removeAttachement($attachement);
        $em = $this->getDoctrine()->getManager();
        $em->flush();

        return new JsonResponse([
            'error' => '',
            'server_id' => $id  , //last db insert id
        ]);

    }

    /**
     * @Route("/entite/d/{id}", name="delete_entite")
     */
    public function deleteEntite($id,Request $request)
    {
        $entite = $this->getDoctrine()->getManager()->getRepository(Entites::class)->find($id);
        if ($entite != null){
            $affaire_id = $entite->getAffaire()->getId();
            $em = $this->getDoctrine()->getManager();
            $em->remove($entite);
            $em->flush();
            $request->getSession()->getFlashBag()->add('delete_entite', 'L\'element a été supprime avec succès');
            return $this->redirectToRoute('affaire_details', array('id' => $affaire_id));
        }else{
            return $this->redirectToRoute('dashboard');
        }

    }


    /**
     * @Route("/entite/details/{entite}", name="details_entite")
     */
    public function detailsEntie(Entites $entite,Request $request, TextContentJob $contentJob)
    {

        $entite->setResume($contentJob->parseTextContent($entite->getResume()));


        return $this->render('entite/details.html.twig', [
            'controller_name' => 'EntiteController',
            'active' => 'affaire',
            'entite' => $entite,
        ]);
    }

}
