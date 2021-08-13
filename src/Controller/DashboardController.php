<?php

namespace App\Controller;

use App\Entity\Tache;
use App\Entity\TacheUtilisateur;
use App\Form\TaskAcceptType;
use App\Form\TaskRejectType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{


    /**
     * @Route("/", name="home")
     */
    public function redirectToIndex(Request $request)
    {

        return $this->redirectToRoute('dashboard');
    }

    /**
     * @Route("/d/{t_id}", name="dashboard")
     */
    public function index($t_id = null, Request $request): Response
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

        if ($t_id != null){
            $db_task = $this->getDoctrine()->getManager()->getRepository(Tache::class)->find($t_id);
        }else{
            $db_task = null;
        }

        $currentRoute = $request->attributes->get('_route');

        $acceptTaskForm = $this->createForm(TaskAcceptType::class);
        $rejectTaskForm = $this->createForm(TaskRejectType::class);

        $acceptTaskForm->handleRequest($request);
        $rejectTaskForm->handleRequest($request);

        $status_array = [0,1,2];

        $tachesUtilisateur = $this->getDoctrine()->getManager()->getRepository(TacheUtilisateur::class)->findOneBy([
            'tache' =>  $db_task,
            'utilisateur' => $user
        ]);

        if ($acceptTaskForm->isSubmitted() && $acceptTaskForm->isValid()){

            if ($tachesUtilisateur != null && $tachesUtilisateur->getStatut() == 0){
                $tachesUtilisateur->setStatut(1);  // accepter
                $tachesUtilisateur->setUpdatedAt(new \DateTime());  // accepter
                $tachesUtilisateur->setRemarque($acceptTaskForm->get('remarque')->getData());  // accepter
                $em = $this->getDoctrine()->getManager();
                $em->flush();

                $request->getSession()->getFlashBag()->add('accept_task', 'Tache acceptee');
                return $this->redirectToRoute('dashboard');
            }
        }

        if ($rejectTaskForm->isSubmitted() && $rejectTaskForm->isValid() ){

            if ($tachesUtilisateur != null && $tachesUtilisateur->getStatut() == 0){
                $tachesUtilisateur->setStatut(2);  // refuser
                $tachesUtilisateur->setUpdatedAt(new \DateTime());  // refuser
                $tachesUtilisateur->setRemarque($acceptTaskForm->get('remarque')->getData());  // refuser
                $em = $this->getDoctrine()->getManager();
                $em->flush();

                $request->getSession()->getFlashBag()->add('reject_task', 'Tache rejetee');
                return $this->redirectToRoute('dashboard');

            }
        }



        return $this->render('dashboard/index.html.twig', [
            'controller_name' => 'DashboardController',
            'user' => $user,
            'active' => "dashboard",
            'toDo' => "dashboard",
            'tasks' => $tasksCreated,
            'tacheUtilisateur' => $tachesUtilisateurs,
            'db_task' => $db_task,
            'rejectTaskForm' => $rejectTaskForm->createView(),
            'acceptTaskForm' => $acceptTaskForm->createView(),
        ]);
    }


}
