<?php

namespace App\Controller;

use App\Entity\Affaire;
use App\Entity\Courrier;
use App\Entity\Departement;
use App\Form\CourrierType;
use App\Service\FileToImg;
use App\Service\FileUploader;
use DH\Auditor\Provider\Doctrine\DoctrineProvider;
use DH\Auditor\Provider\Doctrine\Persistence\Reader\Reader;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



class CourrierController extends AbstractController
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
            'flux' => Courrier::FLUX_ENTRANT
        ],
        [
            'createdAt' => 'DESC'
        ]);

        $envoi = $this->getDoctrine()->getManager()->getRepository(Courrier::class)->findBy([
            'flux' => Courrier::FLUX_SORTANT
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
     * @Route("/c/n/{responseTo}", name="create-courrier")
     */
    public function create($responseTo = null , Request $request, FileUploader $fileUploader, FileToImg $fileToImg): Response
    {


        if ($responseTo != null) {

            $responseTo = $this->getDoctrine()->getManager()->getRepository(Courrier::class)->find(intval($responseTo));

        }

        $courrier = new Courrier();

        if ($responseTo != null) {
            $courrier->setResponseTo($responseTo);

        }

        $courrierForm = $this->createForm(CourrierType::class,$courrier);

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

            foreach ($courrier->getPiecejointe() as $piecejointe){
                $piecejointe->setFilename($fileUploader->upload($piecejointe->getFile(),$this->courrierDir.'/'.md5($courrier->getEntry())));
                $fileToImg->convert($piecejointe);
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
     * @Route("/c/d/{courrier}", name="view_courrier")
     */
    public function viewCourrier(Courrier $courrier): Response
    {


        return $this->render('courrier/view.html.twig', [
            'controller_name' => 'CourrierController',
            'active' => 'courrier',
            'courrier' => $courrier,
        ]);
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
