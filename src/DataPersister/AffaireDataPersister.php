<?php


namespace App\DataPersister;


use App\Entity\Affaire;
use App\Entity\AffaireUtilisateur;
use App\Entity\Departement;
use App\Entity\Utilisateur;
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

        $gen_id = 'AFF-DNE-'.time().'-'.random_int(100, 999999);

        if (null !== $this->entityManager->getRepository(Affaire::class)->findOneBy(['numeroMatricule' => $gen_id])) {
            $data->setNumeroMatricule($gen_id);
        }

        $token = $this->tokenStorage->getToken();
        $user = $token->getUser();
        $db_user = $this->entityManager->getRepository(Utilisateur::class)->find($user->getId());
        $data->setCreatedBy($user);
        $data->setDepartement($db_user->getDepartement());

        $this->entityManager->persist($data);
        $this->entityManager->flush();

        $affaireUtilisateur = new AffaireUtilisateur();
        $affaireUtilisateur->setAffaire($data);
        $affaireUtilisateur->setUtilisateur($db_user);
        $affaireUtilisateur->setNiveauAccreditation($data->getNiveauAccreditation());
        $affaireUtilisateur->setResponsability('');
        $this->entityManager->persist($affaireUtilisateur);
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