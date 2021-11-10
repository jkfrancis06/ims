<?php

namespace App\EventListener;

use App\Entity\UserSession;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use App\Entity\Utilisateur;

class LoginListener
{

    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function onSecurityInteractiveLogin(InteractiveLoginEvent $event)
    {
        // Get the User entity.
        $user = $event->getAuthenticationToken()->getUser();

        // Update  field .

        $userSession = new UserSession();

        $userSession->setUtilisateur($user);

        $userSession->setStartAt(new \DateTimeImmutable());

        $userSession->setSessionId($event->getRequest()->getSession()->getId());

        // Persist the data to database.
        $this->em->persist($userSession);
        $this->em->flush();
    }

}