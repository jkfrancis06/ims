<?php


namespace App\DataPersister;


use App\Entity\Affaire;
use App\Entity\Utilisateur;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UtilisateurDataPersister implements \ApiPlatform\Core\DataPersister\DataPersisterInterface
{

    private $entityManager;
    private $userPasswordEncoder;

    public function __construct(EntityManagerInterface $entityManager,UserPasswordEncoderInterface $userPasswordEncoder)
    {
        $this->entityManager = $entityManager;
        $this->userPasswordEncoder = $userPasswordEncoder;

    }

    /**
     * @inheritDoc
     */
    public function supports($data): bool
    {
        // TODO: Implement supports() method.

        return $data instanceof Utilisateur;
    }

    /**
     * @inheritDoc
     */
    public function persist($data)
    {
        // TODO: Implement persist() method.

        $gen_id = 'AFF-DNE-'.time().'-'.random_int(100, 999999);

        if (null !== $this->entityManager->getRepository(Utilisateur::class)->findOneBy(['numeroMatricule' => $gen_id])) {
            $data->setNumeroMatricule($gen_id);
        }

        if ($data->getPlainPassword()) {
            $data->setPassword(
                $this->userPasswordEncoder->encodePassword($data, $data->getPlainPassword())
            );
            $data->eraseCredentials();
        }

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