<?php

namespace App\DataFixtures;

use App\Entity\Affaire;
use App\Entity\AffaireDepartement;
use App\Entity\AffaireUtilisateur;
use App\Entity\Departement;
use App\Entity\Utilisateur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
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


        for ($i = 0; $i <= 5; $i++){
            $departement = new Departement();
            $departement->setNom('Depart-'.rand(0, 1000));
            $departement->setDescription('A generated departement'.rand(0,1000));

            $manager->persist($departement);
            $manager->flush();
        }

        $dep_repo = $manager->getRepository(Departement::class);
        $dep = $dep_repo->findAll();

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
                    'ROLE_USER',
                    'USER_VIEW_DEP',
                    'USER_VIEW_AFF'
                ]);
            }
            if ($i >= 5 && $i < 7) {
                $user->setRoles([
                    'ROLE_USER',
                    'USER_VIEW_DEP',
                    'ROLE_CREATOR',
                    'USER_VIEW_AFF'
                ]);
            }
            if ($i >= 7) {
                $user->setRoles([
                    'ROLE_USER',
                    'USER_VIEW_DEP',
                    'ROLE_CREATOR',
                    'ROLE_ADMIN',
                    'USER_VIEW_AFF'
                ]);
            }
            $dep_rand = rand(0,sizeof($dep)-1);
            $user->setDepartement($dep[$dep_rand]);
            $manager->persist($user);
            $manager->flush();
        }



        $utilisateur_repo = $manager->getRepository(Utilisateur::class);
        $utilisateurs = $utilisateur_repo->findAll();
        $temp = [];


        foreach ($utilisateurs as $utilisateur){
            if (in_array('ROLE_CREATOR',$utilisateur->getRoles()) || in_array('ROLE_ADMIN',$utilisateur->getRoles())){
                array_push($temp,$utilisateur);
            }
        }
        for ($i = 0; $i <= 30 ; $i ++){
            $rand = rand(0, 1000);
            $affaire = new Affaire();
            $affaire->setNom('Affaire -'.$rand);
            $affaire->setDescription('Description -'.$rand);
            $affaire->setSource('Source -'.$rand);
            $affaire->setResume('Resume -'.$rand);
            $util_rand = rand(0,sizeof($temp)-1);
            $affaire->setCreatedBy($temp[$util_rand]);
            $dep_rand = rand(0,sizeof($dep)-1);
            $affaire->setDepartement($dep[$dep_rand]);
            $manager->persist($affaire);
            $manager->flush();

        }

        $affaire_repo = $manager->getRepository(Affaire::class);

        $affaires = $affaire_repo->findAll();

        foreach ($affaires as $affaire){
            $departement = $affaire->getDepartement();

            $dep_users = $utilisateur_repo->findBy([
                'departement' => $departement
            ]);

            if ($dep_users != null) {
                $rand = rand(0,sizeof($dep_users)-1);
                for ($i = 0; $i <= $rand; $i++){
                    $affaireUtilisateur = new AffaireUtilisateur();
                    $affaireUtilisateur->setAffaire($affaire);
                    $affaireUtilisateur->setUtilisateur($dep_users[$i]);
                    $affaireUtilisateur->setResponsability('Responsability-'.$dep_users[$i]->getNom());
                    $manager->persist($affaireUtilisateur);
                    $manager->flush();
                }
            }


        }



    }
}
