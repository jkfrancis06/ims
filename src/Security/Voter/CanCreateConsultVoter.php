<?php

namespace App\Security\Voter;

use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\User\UserInterface;

class CanCreateConsultVoter extends Voter
{
    protected function supports(string $attribute, $subject): bool
    {
        // replace with your own logic
        // https://symfony.com/doc/current/security/voters.html
        return in_array($attribute, ['USER_VIEW_AFF'])
            && $subject instanceof \App\Entity\CanConsult;
    }

    protected function voteOnAttribute(string $attribute, $subject, TokenInterface $token): bool
    {
        $user = $token->getUser();
        // if the user is anonymous, do not grant access
        if (!$user instanceof UserInterface) {
            return false;
        }


        $utilisateurAffaires = $user->getAffaireUtilisateurs();

        $onAffaire = false;

        if ($utilisateurAffaires != null) {
            foreach ($utilisateurAffaires as $utilisateurAffaire){
                if ($utilisateurAffaire == $subject->getAffaire()){
                    $onAffaire = true;
                    break;
                }
            }
        }

        if (in_array('ROLE_ADMIN',$user->getRoles()) || $onAffaire == true){
            return true;
        }

        // ... (check conditions and return true to grant permission) ...
        switch ($attribute) {
            case 'POST_EDIT':
                // logic to determine if the user can EDIT
                // return true or false
                break;
            case 'POST_VIEW':
                // logic to determine if the user can VIEW
                // return true or false
                break;
        }

        return false;
    }
}
