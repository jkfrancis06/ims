<?php

namespace App\Security\Voter;

use App\Entity\AffaireUtilisateur;
use App\Entity\Utilisateur;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\User\UserInterface;

class GetAffaireItemVoter extends Voter
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
            && $subject instanceof \App\Entity\Affaire;
    }

    protected function voteOnAttribute(string $attribute, $subject, TokenInterface $token): bool
    {
        $user = $token->getUser();
        // if the user is anonymous, do not grant access
        if (!$user instanceof UserInterface) {
            return false;
        }

        // check if user
        $userAffaire = $this->entityManager->getRepository(AffaireUtilisateur::class)
                        ->findBy([
                           'affaire' => $subject,
                           'utilisateur' => $user
                        ]);


        $db_user = $this->entityManager->getRepository(Utilisateur::class)->find($user->getId());



        if ($userAffaire == null){

            $canConsults = $subject->getCanConsults();

            if ($canConsults != null){
                foreach ($canConsults as $canConsult){
                    if ($canConsult->getUtilisateur() == $user &&
                        $canConsult->getIsRevoked() == false &&
                        $canConsult->getStatut() == '0'){
                        return true;
                    }
                }
            }
            if ($db_user->getDepartement() != $subject->getDepartement()){
                return false;
            }elseif ($subject->getNiveauAccreditation() <= $user->getNiveauAccreditation() ){
                return true;
            }

        }else{
            return true;
        }


        return false;


    }
}
