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

        $acceptTaskForm->handleRequest();
        $rejectTaskForm->handleRequest();
        


        return $this->render('dashboard/index.html.twig', [
            'controller_name' => 'DashboardController',
            'user' => $user,
            'active' => "dashboard",
            'toDo' => "dashboard",
            'tasks' => $tasksCreated,
            'tacheUtilisateur' => $tachesUtilisateurs,
            'db_task' => $db_task,
        ]);
    }


    /**
     * @Route("/t/{t_id}/{status}", name="task")
     */
    public function changeTaskStatus($t_id, $status , Request $request)  // update task status
    {

        $user = $this->getUser();

        $status_array = [0,1,2];

        if ($t_id != null){
            $db_task = $this->getDoctrine()->getManager()->getRepository(TacheUtilisateur::class)->find($t_id);
            if ($db_task != null){
                if (!in_array([1,2],$db_task->getStatut()) && in_array($status_array,$status)){
                    $db_task->setStatus();
                }
            }else{
                return $this->redirectToRoute('dashboard');
            }
        }else{
            return $this->redirectToRoute('dashboard');
        }


    }
}
