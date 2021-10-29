<?php


namespace App\EventListener;

use Doctrine\Persistence\ObjectManager;
use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationFailureEvent;
use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTNotFoundEvent;
use Symfony\Component\HttpFoundation\JsonResponse;

class JWTNotFoundListener
{

    /**
     * @param JWTNotFoundEvent $event
     */

    public function onJWTNotFound(JWTNotFoundEvent $event) {

        $data = $event->getResponse();

        $message = [
            'status'  => '401 Unauthorized',
            'type'  => 1,
            'message' => 'Missing token',
        ];

        $data->setMessage($message);

        $event->setResponse($data);
    }



}