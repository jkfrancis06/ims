<?php


namespace App\DataPersister;


use App\Entity\Affaire;
use App\Entity\Tache;
use App\Entity\TacheUtilisateur;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class TacheDataPersister implements \ApiPlatform\Core\DataPersister\DataPersisterInterface
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

        return $data instanceof Tache;
    }

    /**
     * @inheritDoc
     */
    public function persist($data)
    {

        $token = $this->tokenStorage->getToken();
        $user = $token->getUser();
        $data->setCreatedBy($user);
        $this->entityManager->persist($data);
        $this->entityManager->flush();
        $tacheAffaire = $this->entityManager->getRepository(Affaire::class)->find($data->getAffaire());
        $tacheUtilisateur = new TacheUtilisateur();
        $tacheUtilisateur->setUtilisateur($tacheAffaire->getCreatedBy());
        $tacheUtilisateur->setTache($data);
        $this->entityManager->persist($tacheUtilisateur);
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