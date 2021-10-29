<?php

namespace App\Security\Voter;

use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\User\User;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class DepartementGetVoter extends Voter
{


    /** @var  TokenStorageInterface */
    private $tokenStorage;

    public function __construct( TokenStorageInterface $storage){
        $this->tokenStorage = $storage;
    }



    protected function supports(string $attribute, $subject): bool
    {
        // replace with your own logic
        // https://symfony.com/doc/current/security/voters.html
        return in_array($attribute, ['USER_VIEW_DEP'])
            && $subject instanceof \App\Entity\Departement;
    }

    protected function voteOnAttribute(string $attribute, $subject, TokenInterface $token): bool
    {

        $user = $token->getUser();
        // if the user is anonymous, do not grant access
        if (!$user instanceof UserInterface) {
            return false;
        }

        if ($user->getDepartement() == $subject){
            return true;
        }


        return false;
    }
}
