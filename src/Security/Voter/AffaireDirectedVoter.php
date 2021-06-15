<?php

namespace App\Security\Voter;

use App\Entity\AffaireDirected;
use App\Entity\AffaireUtilisateur;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\User\UserInterface;

class AffaireDirectedVoter extends Voter
{

    private $entityManager;
    private $requestStack;

    public function __construct(EntityManagerInterface $entityManager, RequestStack $requestStack) {
        $this->entityManager = $entityManager;
        $this->requestStack = $requestStack;
    }

    protected function supports(string $attribute, $subject): bool
    {
        // replace with your own logic
        // https://symfony.com/doc/current/security/voters.html
        return in_array($attribute, ['USER_VIEW_AFF'])
            && $subject instanceof \App\Entity\AffaireDirected;
    }

    protected function voteOnAttribute(string $attribute, $subject, TokenInterface $token): bool
    {
        $user = $token->getUser();
        // if the user is anonymous, do not grant access
        if (!$user instanceof UserInterface) {
            return false;
        }


        $affaireDirected = $this->entityManager->getRepository(AffaireDirected::class)
            ->findOneBy([
                'utilisateur' => $user,
                'affaire' => $subject->getAffaire(),
                'isRevoked' => false
            ]);



        if ($this->requestStack->getCurrentRequest()->isMethod('DELETE') ||
            $this->requestStack->getCurrentRequest()->isMethod('POST') ||
            $this->requestStack->getCurrentRequest()->isMethod('PUT')
        ){
            if ($affaireDirected != null){
                return true;
            }else{
                return false;
            }
        }

        if ($this->requestStack->getCurrentRequest()->isMethod('GET')){
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
