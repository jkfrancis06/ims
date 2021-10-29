<?php

namespace App\Security\Voter;

use App\Entity\AffaireUtilisateur;
use App\Entity\CanConsult;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\User\UserInterface;

class ConsultEntiteVoter extends Voter
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager) {
        $this->entityManager = $entityManager;
    }

    protected function supports(string $attribute, $subject): bool
    {
        // replace with your own logic
        // https://symfony.com/doc/current/security/voters.html
        return in_array($attribute, ['USER_VIEW_AFF'])
            && $subject instanceof \App\Entity\Entites;
    }

    protected function voteOnAttribute(string $attribute, $subject, TokenInterface $token): bool
    {
        $user = $token->getUser();
        // if the user is anonymous, do not grant access
        if (!$user instanceof UserInterface) {
            return false;
        }

        $can = false;

        $userAffaire = $this->entityManager->getRepository(AffaireUtilisateur::class)
            ->findBy([
                'affaire' => $subject->getAffaire(),
                'utilisateur' => $user
            ]);

        if ($userAffaire == null){
            $canConsults = $this->entityManager->getRepository(CanConsult::class)->findBy([
                'affaire' => $subject->getAffaire()
            ]);

            if ($canConsults != null){
                foreach ($canConsults as $canConsult){
                    if ($canConsult->getUtilisateur() == $user && $canConsult->getStatus() == "0"){
                        return true;
                    }
                }
            }else{
                return false;
            }

        }else{
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
