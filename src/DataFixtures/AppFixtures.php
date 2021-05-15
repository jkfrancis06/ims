<?php

namespace App\DataFixtures;

use App\Entity\Departement;
use App\Entity\Utilisateur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authenticator\Passport\UserPassportInterface;

class AppFixtures extends Fixture
{

    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    private $passwordEncoder;
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }


    public function load(ObjectManager $manager)
    {

        for ($i = 0; $i <= 5; $i++){
            $departement = new Departement();
            $departement->setNom('Depart-'.rand(0, 1000));
            $departement->setDescription('A generated departement'.rand(0,1000));

            $manager->persist($departement);
            $manager->flush();
        }

        for ($i = 0; $i <= 10; $i++){
            $val = rand(0,1000);
            $user = new Utilisateur();
            $user->setNom('nom - '.$val);
            $user->setPrenom('prenom - '.$val);
            $user->setUsername('user-'.$val);
            $user->setSalt(base_convert(sha1(uniqid(mt_rand(), true)), 16, 36));
            $plainPassword ='pass-'.$val;
            $user->setPassword($this->passwordEncoder->encodePassword($user, $plainPassword));
            $user->setIsActive(true);
            if ($i < 5) {
                $user->setRoles([
                    'ROLE_USER'
                ]);
            }
            if ($i >= 5 && $i < 7) {
                $user->setRoles([
                    'ROLE_USER',
                    'ROLE_CREATOR'
                ]);
            }
            if ($i >= 7) {
                $user->setRoles([
                    'ROLE_USER',
                    'ROLE_CREATOR',
                    'ROLE_ADMIN'
                ]);
            }
            $dep_rand = rand(1,6);
            $dep_repo = $manager->getRepository(Departement::class);
            $dep = $dep_repo->find($dep_rand);
            $user->setDepartement($dep);
            $manager->persist($user);
            $manager->flush();
        }
    }
}
