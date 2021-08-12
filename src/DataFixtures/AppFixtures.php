<?php

namespace App\DataFixtures;

use App\Entity\Affaire;
use App\Entity\AffaireDepartement;
use App\Entity\AffaireDirected;
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

        for ($i = 0 ; $i < 5 ; $i ++){
            $affaire = new Affaire();

        }

        /*for ($i = 0 ; $i < 5 ; $i ++){
            $user = new Utilisateur();
            $user->setNom($lipsum->word());
            $user->setPrenom($lipsum->word());
            $user->setUsername($lipsum->word());
            $user->setSalt(base_convert(sha1(uniqid(mt_rand(), true)), 16, 36));
            $plainPassword ='123456';
            $user->setPassword($this->passwordEncoder->encodePassword($user, $plainPassword));
            $user->setIsActive(true);
            $user->setNiveauAccreditation(1);
            $user->setIsDeleted(false);
            $user->setIsActive(true);
            $user->setDepartement($departement);
            $user->setRoles([
                'ROLE_USER',
                'USER_VIEW_DEP',
                'ROLE_ADMIN',
                'ROLE_CREATOR',
                'USER_VIEW_AFF'
            ]);
            $manager->persist($user);
            $manager->flush();
        }*/



        $utilisateur_repo = $manager->getRepository(Utilisateur::class);

        $utilisateurs = $utilisateur_repo->findAll();

        $affaires = $manager->getRepository(Affaire::class)->findAll();

        $utilisateurs_array = [];


        foreach ($utilisateurs as $utilisateur){
            $rand = rand(1, 15);
            for ($i = 1; $i<=$rand; $i++){

                $t_affaire = $affaires[rand(1,sizeof($affaires)-1)];
                $tache = new Tache();
                $tache->setAffaire($t_affaire);
                $tache->setCreatedBy($utilisateur);
                $tache->setPriorite(rand(1,3));
                $tache->setResume($lipsum->sentences(2));
                $tache->setTitre($lipsum->words(5));


                $date = $this->pickDate(null);
                $newformat = date('Y-m-d H:i:s',$date);

                $tache->setExpireAt(new \DateTime($newformat));


                $manager->persist($tache);
                $manager->flush();

                $t_utilisateurs = $t_affaire->getAffaireUtilisateurs();


                $tache_utilisateur = new TacheUtilisateur();

                $tache_utilisateur->setUtilisateur($t_utilisateurs[rand(0,sizeof($t_utilisateurs)-1)]->getUtilisateur());
                $tache_utilisateur->setStatut(rand(0,1));
                $tache_utilisateur->setTache($tache);
                $tache_utilisateur->setRemarque($lipsum->sentences(rand(1,3)));

                $manager->persist($tache_utilisateur);
                $manager->flush();
            }
        }


        /*for ($i = 0; $i <= 30 ; $i ++){
            $rand = rand(0, 1000);
            $affaire = new Affaire();
            $affaire->setNom('Affaire -'.$lipsum->word());
            $affaire->setDescription($lipsum->words(5));
            $affaire->setSource($lipsum->word());
            $affaire->setResume($lipsum->sentences(2));
            $util_rand = rand(0,sizeof($utilisateurs_array)-1);
            $affaire->setCreatedBy($utilisateurs_array[$util_rand]);
            $affaire->setDepartement($departement);
            $affaire->setNiveauAccreditation(rand(1,$utilisateurs_array[$util_rand]->getNiveauAccreditation()));
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
                    $affaireUtilisateur->setResponsability('Responsability- '.$dep_users[$i]->getNom());
                    $manager->persist($affaireUtilisateur);
                    $manager->flush();

                    if ($i == $rand){
                        $affaireDir = new AffaireDirected();
                        $affaireDir->setUtilisateur($dep_users[$i]);
                        $affaireDir->setAffaire($affaire);
                        $manager->persist($affaireDir);
                        $manager->flush();
                    }
                }
            }


        }*/





    }

    function pickDate($prv = null){

        $st_date = '2021-08-11 22:55:01';
        $en_date = '2021-09-11 22:55:01';
        $t_date = '2021-08-15 22:55:01';

        if ($prv == null){
            return rand(strtotime($st_date),strtotime($en_date));
        }else{
            $rd = rand(strtotime($st_date),strtotime($t_date));
            while ($rd <= $prv){
                $rd = rand(strtotime($st_date),strtotime($t_date));
            }
            return $rd;
        }

    }
}
