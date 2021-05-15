<?php


namespace App\EventListener;

use Doctrine\Persistence\ObjectManager;
use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationSuccessEvent;
use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTCreatedEvent;
use Symfony\Component\Security\Core\User\UserInterface;

class JWTCreatedListener
{

    /**
     * @param AuthenticationSuccessEvent $event
     */

    public function onAuthenticationSuccessResponse(AuthenticationSuccessEvent $event) {

        $user = $event->getUser();

        if (!$user instanceof UserInterface) {
            return;
        }

        $payload        = $event->getData();
        $payload['code'] = $event->getResponse()->getStatusCode();
        $payload['message'] = "Authentication success";

        $event->setData($payload);
    }



}