<?php


namespace App\EventListener;

use Doctrine\Persistence\ObjectManager;
use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationFailureEvent;
use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationSuccessEvent;
use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTCreatedEvent;
use Lexik\Bundle\JWTAuthenticationBundle\Response\JWTAuthenticationFailureResponse;
use Namshi\JOSE\JWS;
use Symfony\Component\Security\Core\User\UserInterface;

class AuthenticationFailureListener
{

    /**
     * @param AuthenticationFailureEvent $event
     */

    public function onAuthenticationFailureResponse(AuthenticationFailureEvent $event) {

        $data = $event->getResponse();

        $message = [
            'status'  => '401 Unauthorized',
            'type'  => 1,
            'message' => 'Bad credentials, please verify that your username/password are correctly set',
        ];

        $data->setMessage($message);

        $event->setResponse($data);
    }



}