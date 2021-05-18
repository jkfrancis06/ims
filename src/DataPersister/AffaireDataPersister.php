<?php


namespace App\DataPersister;


use App\Entity\Affaire;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class AffaireDataPersister implements \ApiPlatform\Core\DataPersister\DataPersisterInterface
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

        return $data instanceof Affaire;
    }

    /**
     * @inheritDoc
     */
    public function persist($data)
    {
        // TODO: Implement persist() method.

        $token = $this->tokenStorage->getToken();
        $user = $token->getUser();
        $data->setCreatedBy($user);
        $this->entityManager->persist($data);
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