<?php


namespace App\EventListener;

use Doctrine\Persistence\ObjectManager;
use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationFailureEvent;
use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationSuccessEvent;
use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTCreatedEvent;
use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTExpiredEvent;
use Lexik\Bundle\JWTAuthenticationBundle\Response\JWTAuthenticationFailureResponse;
use Namshi\JOSE\JWS;
use Symfony\Component\Security\Core\User\UserInterface;

class JWTExpiredListener
{

    /**
     * @param JWTExpiredEvent $event
     */

    public function onJWTExpired(JWTExpiredEvent $event) {

        $data = $event->getResponse();

        $message = [
            'status'  => '401 Unauthorized',
            'type'  => 1,
            'message' =>'Your token is expired, please renew it.',
        ];

        $data->setMessage($message);

        $event->setResponse($data);
    }



}