<?php

namespace App\Security\Voter;

use App\Entity\AffaireUtilisateur;
use App\Entity\CanConsult;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\User\UserInterface;

class EnvenementVoter extends Voter
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
            && $subject instanceof \App\Entity\Envenement;
    }

    protected function voteOnAttribute(string $attribute, $subject, TokenInterface $token): bool
    {
        $user = $token->getUser();
        // if the user is anonymous, do not grant access
        if (!$user instanceof UserInterface) {
            return false;
        }



        $userAffaire = $this->entityManager->getRepository(AffaireUtilisateur::class)
            ->findOneBy([
                'affaire' => $subject->getAffaire(),
                'utilisateur' => $user
            ]);


        $canConsult = $this->entityManager->getRepository(CanConsult::class)
                ->findBy([
                   'utilisateur' => $user,
                    'affaire' => $subject->getAffaire(),
                    'statut' => "0"
                ]);

        if ($this->requestStack->getCurrentRequest()->isMethod('POST')){
            return $userAffaire != null;
        }

        if ($this->requestStack->getCurrentRequest()->isMethod('GET')){
            return ($canConsult != null || $userAffaire != null);
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
