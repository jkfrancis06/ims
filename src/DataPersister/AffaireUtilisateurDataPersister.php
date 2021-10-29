<?php


namespace App\DataPersister;


use App\Entity\Affaire;
use App\Entity\AffaireUtilisateur;
use App\Entity\Utilisateur;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class AffaireUtilisateurDataPersister implements \ApiPlatform\Core\DataPersister\DataPersisterInterface
{

    /** @var  TokenStorageInterface */
    private $tokenStorage;
    private $entityManager;

    public function __construct(TokenStorageInterface $storage, EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->tokenStorage = $storage;


    }

    /**
     * @inheritDoc
     */
    public function supports($data): bool
    {
        // TODO: Implement supports() method.

        return $data instanceof AffaireUtilisateur;
    }

    /**
     * @inheritDoc
     */
    public function persist($data)
    {
        // TODO: Implement persist() method.

        $this->entityManager->persist($data);
        $this->entityManager->flush();

        $utilisateur = $data->getUtilisateur();
        $role = $utilisateur->getRoles();
        $role_to_add = 'USER_OWN_AFF';
        array_push($role,$role_to_add);
        $utilisateur->setRoles($role);
        $data->setNiveauAccreditation($data->getAffaire()->getNiveauAccreditation());
        $this->entityManager->flush();

    }


    /**
     * @inheritDoc
     */
    public function remove($data)
    {
        // TODO: Implement remove() method.
        $this->entityManager->remove($data);
        $this->entityManager->flush();
    }
}