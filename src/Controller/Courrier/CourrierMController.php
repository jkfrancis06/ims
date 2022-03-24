<?php

namespace App\Controller\Courrier;

use App\Entity\Affaire;
use App\Entity\Courrier;
use App\Entity\Departement;
use App\Form\CourrierEditType;
use App\Form\CourrierType;
use App\Service\FileToImg;
use App\Service\FileUploader;
use DH\Auditor\Provider\Doctrine\DoctrineProvider;
use DH\Auditor\Provider\Doctrine\Persistence\Reader\Reader;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class CourrierMController extends \Symfony\Bundle\FrameworkBundle\Controller\AbstractController
{

    /**
     * @var string
     */
    private $projectDir;

    /**
     * @var string
     */
    private $courrierDir;

    /**
     * @var DoctrineProvider
     */
    private $provider;

    public function __construct(string $projectDir, string $courrierDir, DoctrineProvider $provider)
    {
        $this->projectDir = $projectDir;
        $this->courrierDir = $courrierDir;
        $this->provider = $provider;
    }

    /**
     * @Route("/c", name="courrier")
     */
    public function index(): Response
    {


        $reception = $this->getDoctrine()->getManager()->getRepository(Courrier::class)->findBy([
            'flux' => Courrier::FLUX_ENTRANT,
            'isDeleted' => false
        ],
            [
                'createdAt' => 'DESC'
            ]);

        $envoi = $this->getDoctrine()->getManager()->getRepository(Courrier::class)->findBy([
            'flux' => Courrier::FLUX_SORTANT,
            'isDeleted' => false
        ],
            [
                'createdAt' => 'DESC'
            ]);

        return $this->render('courrier/index.html.twig', [
            'controller_name' => 'CourrierController',
            'active' => 'courrier',
            'envoi' => $envoi,
            'reception' => $reception,
        ]);
    }



    /**
     * @Route("/c/n/{responseTo}", name="create-courrier", defaults={"responseTo" = null})
     */
    public function create($responseTo = null , Request $request, FileUploader $fileUploader, FileToImg $fileToImg): Response
    {


        if ($responseTo != null) {

            $responseTo = $this->getDoctrine()->getManager()->getRepository(Courrier::class)->findOneBy([
                'id' => intval($responseTo),
                'isDeleted' => false
            ]);

        }

        $courrier = new Courrier();

        if ($responseTo != null) {
            $courrier->setResponseTo($responseTo);

        }

        $courrierForm = $this->createForm(CourrierType::class,$courrier,['validation_groups'=>'create']);

        $courrierForm->handleRequest($request);

        if ($courrierForm->isSubmitted()){
            if ($courrier->getIsResponse() == true && $courrier->getResponseTo() == null){
                $error = new FormError("Veuillez specifier le courrier auquel repondre");
                $courrierForm->get('responseTo')->addError($error);
            }


        }

        if($courrierForm->isSubmitted() && $courrierForm->isValid()){

            $defaultData = null;

            if ($courrier->getResponseTo() != null) {

                if ($courrier->getResponseTo()->getSender() != null) {
                    $defaultData = $courrier->getResponseTo()->getSender();
                }
                if ($courrier->getResponseTo()->getReceiver() != null) {
                    $defaultData = $courrier->getResponseTo()->getReceiver();
                }

            }

            if ($courrier->getFlux() == Courrier::FLUX_ENTRANT) {

                if ($responseTo != null) {

                    $courrier->setSender($defaultData);

                }

            }

            if ($courrier->getFlux() == Courrier::FLUX_SORTANT) {

                if ($responseTo != null) {

                    $courrier->setReceiver($defaultData);

                }

            }

            $courrier->setEntry(uniqid('entry_', true));

            if ($courrier->getPiecejointe() != null) {
                foreach ($courrier->getPiecejointe() as $piecejointe){
                    $piecejointe->setFilename($fileUploader->upload($piecejointe->getFile(),$this->courrierDir.'/'.md5($courrier->getEntry())));
                    $fileToImg->convert($piecejointe);
                }
            }


            $courrier->setCreatedBy($this->getUser());

            $em = $this->getDoctrine()->getManager();

            if ($courrier->getAffectation() instanceof Departement){
                $courrier->setStatut(Courrier::STATUT_AFFECTE);
            }else{
                $courrier->setStatut(Courrier::STATUT_ACCUSE);
            }


            $em->persist($courrier);

            $em->flush();


            $request->getSession()->getFlashBag()->add('courrier_create', 'Le courrier a été cree avec succès');

            return $this->redirectToRoute('courrier');


        }

        return $this->render('courrier/create.html.twig', [
            'controller_name' => 'CourrierController',
            'active' => 'courrier',
            'responseTo' => $responseTo,
            'courrierForm' => $courrierForm->createView()
        ]);
    }




    /**
     * @Route("/c/deleted/{courrier}", name="delete_courrier")
     */
    public function deleteCourrier(Courrier $courrier,Request $request): Response
    {

        $courrier->setIsDeleted(true);

        $em = $this->getDoctrine()->getManager();

        $em->flush();

        $request->getSession()->getFlashBag()->add('delete_create', 'Le courrier a été supprimé avec succès');

        $referer = $request->headers->get('referer');

        return $this->redirect($referer);


    }


    /**
     * @Route("/c/d/{courrier}", name="view_courrier")
     */
    public function viewCourrier(Courrier $courrier): Response
    {

        if (!$courrier->getIsDeleted()) {
            return $this->render('courrier/view.html.twig', [
                'controller_name' => 'CourrierController',
                'active' => 'courrier',
                'courrier' => $courrier,
            ]);
        }else{
           throw new NotFoundHttpException('Non trouve');
        }


    }


    /**
     * @Route("/c/edit/{courrier}", name="edit_courrier")
     */
    public function editCourrier(Courrier $courrier, Request $request, FileUploader $fileUploader, FileToImg $fileToImg): Response
    {


        if (!$courrier->getIsDeleted()) {

            $editForm = $this->createForm(CourrierEditType::class,$courrier);

            $editForm->handleRequest($request);

            if ($editForm->isSubmitted() && $editForm->isValid()) {

                $courrier->setEntry(uniqid('entry_', true));

                if ($courrier->getPiecejointe() != null) {
                    foreach ($courrier->getPiecejointe() as $piecejointe){
                        if ($piecejointe->getFile() != null ) {
                            $piecejointe->setFilename($fileUploader->upload($piecejointe->getFile(),$this->courrierDir.'/'.md5($courrier->getEntry())));
                            $fileToImg->convert($piecejointe);
                        }
                    }
                }


                $courrier->setLastUpdate(new \DateTime());

                $em = $this->getDoctrine()->getManager();

                $em->flush();


                $request->getSession()->getFlashBag()->add('courrier_create', 'Le courrier a été modifié avec succès');

                return $this->redirectToRoute('courrier');

            }

            return $this->render('courrier/edit.html.twig', [
                'controller_name' => 'CourrierController',
                'active' => 'courrier',
                'courrier' => $courrier,
                'courrierForm' => $editForm->createView(),
            ]);

        }else{

            throw new NotFoundHttpException('Non trouve');

        }


    }


    /**
     * @Route("/c/all", name="all_courrier")
     */
    public function allCourrier(FileToImg $fileToImg): Response
    {


        $courriers = $this->getDoctrine()->getManager()->getRepository(Courrier::class)->findAll();

        foreach ($courriers as $courrier) {

            if ($courrier->getPiecejointe() != null ) {

                foreach ($courrier->getPiecejointe() as $piecejointe) {
                    $fileToImg->convert($piecejointe);
                }

            }



        }

        return new Response('ok');
    }

}