<?php

namespace App\Controller;

use App\Entity\Entites;
use App\Entity\Organisation;
use App\Entity\Personne;
use App\Entity\Search\EntitySearch;
use App\Entity\Vehicule;
use App\Form\Search\EntitySearchType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    /**
     * @Route("/affaire/search", name="search_affaire")
     */
    public function index(Request $request): Response
    {
        $searchForm = $this->createForm(EntitySearchType::class);

        $searchForm->handleRequest($request);

        $entites = [];

        if ($searchForm->isSubmitted() && $searchForm->isValid()){

            $data = $searchForm->get('entity')->getData();

            if ($searchForm->get('type')->getData() == EntitySearchType::TYPE_PERSON) {
                $entites = $this->getDoctrine()->getManager()->getRepository(Personne::class)->searchEntite($data);
            }

            if ($searchForm->get('type')->getData() == EntitySearchType::TYPE_VEHICULE) {
                $entites = $this->getDoctrine()->getManager()->getRepository(Vehicule::class)->searchEntite($data);
            }

            if ($searchForm->get('type')->getData() == EntitySearchType::TYPE_ORGANISATION) {
                $entites = $this->getDoctrine()->getManager()->getRepository(Organisation::class)->searchEntite($data);
            }


        }

        return $this->render('search/index.html.twig', [
            'controller_name' => 'SearchController',
            'active' => 'search_affaire',
            'searchForm' => $searchForm->createView(),
            'entites' => $entites,
        ]);
    }
}
