<?php

namespace App\EventListener;


use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAccountStatusException;
use Symfony\Component\Security\Http\Event\CheckPassportEvent;
use Symfony\Component\Security\Http\Authenticator\Passport\UserPassportInterface;

class CustomUserChecksListener implements EventSubscriberInterface
{

    public static function getSubscribedEvents()
    {
        return [CheckPassportEvent::class => 'onCheckUser'];
    }

    public function onCheckUser(CheckPassportEvent $event)
    {
        if (!$event->getPassport() instanceof UserPassportInterface) {
            return;
        }

        $user = $event->getPassport()->getUser();

        if ($user->getIsDeleted()) {
            // the message passed to this exception is meant to be displayed to the user
            throw new CustomUserMessageAccountStatusException('Votre compte a été supprimé');
        }

        if (!$user->getIsActive()) {
            throw new CustomUserMessageAccountStatusException('Le compte a été desactivé. Veuillez contacter l\'administrateur ');
        }
    }

}