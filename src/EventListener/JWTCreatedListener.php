<?php


namespace App\EventListener;

use Doctrine\Persistence\ObjectManager;
use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationSuccessEvent;
use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTCreatedEvent;
use Namshi\JOSE\JWS;
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


        $jws = JWS::load($payload  = $event->getData()["token"]);

        $payload  = $event->getData();
        $payload['code'] = $event->getResponse()->getStatusCode();
        $payload['user'] = [];
        $payload['user']["id"] = $user->getId();
        $payload['user']["nom"] = $user->getNom();
        $payload['user']["prenom"] = $user->getPrenom();
        $payload['user']["departement"] = $user->getDepartement()->getId();
        $payload['user']["roles"] = $user->getRoles();
        $payload['user']["username"] = $user->getUsername();
        $payload['user']["niveauAccreditation"] = $user->getNiveauAccreditation();
        $payload['expires'] = $jws->getPayload()['exp'];
        $payload['message'] = "Authentication success";

        $event->setData($payload);
    }



}