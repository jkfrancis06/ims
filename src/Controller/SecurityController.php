<?php

namespace App\Controller;

use App\Entity\UserSession;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{

    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        if ($this->getUser()) {
            return $this->redirectToRoute('dashboard');
        }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }



    /**
     * @Route("/before-logout", name="app_before_logout")
     */
    public function beforeLogout(Request $request)
    {
        /*
         * Logic before logout
         */

        $em = $this->getDoctrine()->getManager();


        $session = $this->getDoctrine()->getManager()->getRepository(UserSession::class)->findOneBy([
           'sessionId' =>  $request->getSession()->getId()
        ]);

        if ($session != null) {

            $session->setEndAt(new \DateTimeImmutable());

        }else{

            $userSession = new UserSession();

            $userSession->setUtilisateur($this->getUser());

            $userSession->setEndAt(new \DateTimeImmutable());

            $userSession->setSessionId($request->getSession()->getId());

            // Persist the data to database.
            $em->persist($userSession);

        }

        $em->flush();


        return $this->redirectToRoute('app_logout');
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout(Request $request)
    {

        /*$data = [
            $request->getSession()->getId()
        ];

        $file = fopen("session.csv","a");

        fputcsv($file, $data);

        fclose($file);*/

        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }


    /**
     * @Route("/secure-area", name="dmz")
     */
    public function dmz(Request $request)
    {

        $userSession = new UserSession();

        $userSession->setUtilisateur($this->getUser());

        $userSession->setStartAt(new \DateTimeImmutable());

        $userSession->setSessionId($request->getSession()->getId());

        $em = $this->getDoctrine()->getManager();
        // Persist the data to database.
        $em->persist($userSession);

        $em->flush();

        if($this->getUser()->hasRole('ROLE_COURRIER')){
            return $this->redirect($this->generateUrl('courrier'));
        }else{
            return $this->redirect($this->generateUrl('dashboard'));
        }
    }



}
