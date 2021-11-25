<?php

namespace App\Controller;

use App\Entity\Affaire;
use App\Entity\Courrier;
use App\Entity\Departement;
use App\Form\CourrierType;
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

            $courrier->setEntry(uniqid('entry_', true));

            foreach ($courrier->getPiecejointe() as $piecejointe){
                $piecejointe->setFilename($fileUploader->upload($piecejointe->getFile(),$this->courrierDir.'/'.md5($courrier->getEntry())));
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
