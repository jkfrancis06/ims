<?php

namespace App\DataFixtures;

use App\Entity\Affaire;
use App\Entity\AffaireDepartement;
use App\Entity\AffaireUtilisateur;
use App\Entity\Departement;
use App\Entity\Tache;
use App\Entity\TacheUtilisateur;
use App\Entity\Utilisateur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use joshtronic\LoremIpsum;
use Ramsey\Uuid\Uuid;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authenticator\Passport\UserPassportInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class AppFixtures extends Fixture
{

    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    private $passwordEncoder;
    private $validator;


    public function __construct(ValidatorInterface $validator, UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
        $this->validator = $validator;
    }


    public function load(ObjectManager $manager)
    {

        $lipsum = new LoremIpsum();

        $departement = $manager->getRepository(Departement::class)->find(4);
        


        $user = new Utilisateur();
        $user->setNom('Oussama');
        $user->setPrenom('T');
        $user->setUsername('oussamat');
        $user->setSalt(base_convert(sha1(uniqid(mt_rand(), true)), 16, 36));
        $plainPassword ='OussamaT@123';
        $user->setPassword($this->passwordEncoder->encodePassword($user, $plainPassword));
        $user->setIsActive(truezz);
        $user->setNiveauAccreditation(5);
        $user->setDepartement($departement);
        $user->setRoles([
            'ROLE_USER',
            'USER_VIEW_DEP',
            'ROLE_CREATOR',
            'USER_VIEW_AFF'
        ]);
        $manager->persist($user);
        $manager->flush();




    }
}
