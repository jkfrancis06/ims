<?php

namespace App\EventListener;

use App\Entity\UserSession;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\Routing\Router;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use App\Entity\Utilisateur;
use Symfony\Component\Security\Http\Event\LogoutEvent;
use Symfony\Component\Security\Http\Logout\LogoutHandlerInterface;

class LogoutListener
{

    private $entityManager;
    private $logger;
    private $router;

    public function __construct(EntityManagerInterface $entityManager, LoggerInterface $logger,RouterInterface $router)
    {
        $this->entityManager = $entityManager;
        $this->logger = $logger;
        $this->router = $router;
    }

    public function onSecurityInteractiveLogout()
    {

    }

    public function onKernelRequest(RequestEvent $event)
    {
        $data = [
            $event->getRequest()->getSession()->getId()
        ];

        $file = fopen("session.csv","a");

        fputcsv($file, $data);

        fclose($file);

        if ($event->getRequest()->getPathInfo() === '/logout') {
            $event->setResponse(new RedirectResponse($this->router->generate('app_login')));
        }


        /*$userSession = $this->entityManager->getRepository(UserSession::class)->findOneBy([
            'sessionId' => $event->getRequest()->getSession()->getId()
        ]);

        $userSession->setEndAt(new \DateTimeImmutable());
        $this->entityManager->flush();*/

    }
}