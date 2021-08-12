<?php

namespace App\Controller;

use App\Entity\Tache;
use App\Entity\TacheUtilisateur;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    /**
     * @Route("/", name="dashboard")
     */
    public function index(): Response
    {

        $user = $this->getUser();

        $tasksCreated = $this->getDoctrine()->getManager()->getRepository(Tache::class)
            ->findBy([
                'createdBy' => $user
            ]);

        $tachesUtilisateurs = $this->getDoctrine()->getManager()->getRepository(TacheUtilisateur::class)
            ->findBy([
                'utilisateur' => $user
            ]);

        return $this->render('dashboard/index.html.twig', [
            'controller_name' => 'DashboardController',
            'user' => $user,
            'active' => "dashboard",
            'toDo' => "dashboard",
            'tasks' => $tasksCreated,
            'tacheUtilisateur' => $tachesUtilisateurs,
        ]);
    }
}
