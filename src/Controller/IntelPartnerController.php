<?php

namespace App\Controller;

use App\Entity\IntelPartner;
use App\Form\IntelPartnerType;
use App\Repository\IntelPartnerRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/intel/partner")
 */
class IntelPartnerController extends AbstractController
{
    /**
     * @Route("/", name="intel_partner_index", methods={"GET"})
     */
    public function index(IntelPartnerRepository $intelPartnerRepository): Response
    {
        return $this->render('intel_partner/index.html.twig', [
            'active' => 'intel_partner_index',
            'intel_partners' => $intelPartnerRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="intel_partner_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $intelPartner = new IntelPartner();
        $form = $this->createForm(IntelPartnerType::class, $intelPartner);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($intelPartner);
            $entityManager->flush();

            $request->getSession()->getFlashBag()->add('affaire_partner', 'Le partenaire a été crée avec succès');

            return $this->redirectToRoute('intel_partner_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('intel_partner/new.html.twig', [
            'active' => 'intel_partner_index',
            'intel_partner' => $intelPartner,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="intel_partner_show", methods={"GET"})
     */
    public function show(IntelPartner $intelPartner): Response
    {
        return $this->render('intel_partner/show.html.twig', [
            'active' => 'intel_partner_index',
            'intel_partner' => $intelPartner,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="intel_partner_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, IntelPartner $intelPartner, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(IntelPartnerType::class, $intelPartner);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            $request->getSession()->getFlashBag()->add('affaire_partner_edit', 'Le partenaire a été modifié avec succès');


            return $this->redirectToRoute('intel_partner_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('intel_partner/edit.html.twig', [
            'active' => 'intel_partner_index',
            'intel_partner' => $intelPartner,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="intel_partner_delete", methods={"POST"})
     */
    public function delete(Request $request, IntelPartner $intelPartner, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$intelPartner->getId(), $request->request->get('_token'))) {
            $entityManager->remove($intelPartner);
            $entityManager->flush();
        }

        return $this->redirectToRoute('intel_partner_index', [], Response::HTTP_SEE_OTHER);
    }
}
