<?php

namespace App\Security;

use App\Entity\UserSession;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

class SessionLogoutHandler implements \Symfony\Component\Security\Http\Logout\LogoutHandlerInterface
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

    /**
     * @inheritDoc
     */
    public function logout(Request $request, Response $response, TokenInterface $token)
    {
        $userSession = new UserSession();
        
        $userSession->setUtilisateur($token->getUser());

        $userSession->setStartAt(new \DateTimeImmutable());

        $userSession->setSessionId($request->getSession()->getId());

        // Persist the data to database.
        $this->entityManager->persist($userSession);
        $this->entityManager->flush();
    }
}