<?php


namespace App\EventListener;

use Doctrine\Persistence\ObjectManager;

use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTInvalidEvent;
use Lexik\Bundle\JWTAuthenticationBundle\Response\JWTAuthenticationFailureResponse;
use Namshi\JOSE\JWS;
use Symfony\Component\Security\Core\User\UserInterface;

class JWTInvalidListener
{

    /**
     * @param JWTInvalidEvent $event
     */

    public function onJWTInvalid(JWTInvalidEvent $event) {

        $data = $event->getResponse();

        $message = [
            'status'  => '401 Unauthorized',
            'type'  => 1,
            'message' => 'Your token is invalid, please login again to get a new one'
        ];

        $data->setMessage($message);


        $event->setResponse($data);
    }



}