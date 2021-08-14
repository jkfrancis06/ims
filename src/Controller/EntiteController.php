<?php

namespace App\Controller;

use App\Entity\Organisation;
use App\Entity\Personne;
use App\Entity\Vehicule;
use App\Form\OrganisationType;
use App\Form\PersonneType;
use App\Form\VehiculeType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EntiteController extends AbstractController
{
    /**
     * @Route("/affaire/ec/{type}", name="create_entite")
     */
    public function index($type, Request $request): Response
    {

        $personne = new Personne();
        $vehicule = new Vehicule();
        $organisation = new Organisation();

        $personneForm = $this->createForm(PersonneType::class,$personne);
        $vehiculeForm = $this->createForm(VehiculeType::class,$vehicule);
        $organisationForm = $this->createForm(OrganisationType::class, $organisation);

        $personneForm->handleRequest($request);
        $vehiculeForm->handleRequest($request);
        $organisationForm->handleRequest($request);


        if ($type == 1) {  // personne

        }elseif ($type == 2){   // vehicule

        }elseif ($type == 3){   // organisation

        }else{
            return $this->redirectToRoute('dashboard');
        }


        return $this->render('entite/create.html.twig', [
            'controller_name' => 'EntiteController',
            'active' => 'affaire',
            'type' => $type,
            'personneForm' => $personneForm->createView(),
            'vehiculeForm' => $vehiculeForm->createView(),
            'organisationForm' => $organisationForm->createView(),
        ]);
    }
}
