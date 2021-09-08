<?php

namespace App\Controller;

use App\Entity\Courrier;
use App\Entity\Departement;
use App\Form\CourrierType;
use App\Service\FileUploader;
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

    public function __construct(string $projectDir, string $courrierDir)
    {
        $this->projectDir = $projectDir;
        $this->courrierDir = $courrierDir;
    }

    /**
     * @Route("/c", name="courrier")
     */
    public function index(): Response
    {
        return $this->render('courrier/index.html.twig', [
            'controller_name' => 'CourrierController',
            'active' => 'courrier',
        ]);
    }



    /**
     * @Route("/c/n", name="create-courrier")
     */
    public function create(Request $request, FileUploader $fileUploader): Response
    {
        $courrier = new Courrier();

        $courrierForm = $this->createForm(CourrierType::class,$courrier);

        $courrierForm->handleRequest($request);

        if ($courrierForm->isSubmitted()){
            if ($courrier->getIsResponse() == true && $courrier->getResponseTo() == null){
                $error = new FormError("Veuillez specifier le courrier auquel repondre");
                $courrierForm->get('responseTo')->addError($error);
            }
        }

        if($courrierForm->isSubmitted() && $courrierForm->isValid()){


            foreach ($courrier->getPiecejointe() as $piecejointe){
                $piecejointe->setFilename($fileUploader->upload($piecejointe->getFile(),$this->courrierDir));
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
            'courrierForm' => $courrierForm->createView()
        ]);
    }
}
