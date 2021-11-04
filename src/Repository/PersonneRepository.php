<?php

namespace App\Repository;

use App\Entity\Personne;
use App\Form\Search\EntitySearchType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Personne|null find($id, $lockMode = null, $lockVersion = null)
 * @method Personne|null findOneBy(array $criteria, array $orderBy = null)
 * @method Personne[]    findAll()
 * @method Personne[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PersonneRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Personne::class);
    }

    // /**
    //  * @return Personne[] Returns an array of Personne objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */



    public function searchEntite($data)
    {
        $qb =  $this->createQueryBuilder('e');

        // nom
        $nom = strtolower($data['description']);



        if ($nom != null){
            $qb->andWhere("LOWER(e.description)  LIKE '%$nom%'");
        }

        // prenom
        $prenom = strtolower($data['description2']);

        if ($prenom != null){
            $qb->andWhere("LOWER(e.description2) LIKE '%$prenom%'");
        }

        // alias
        $alias = strtolower($data['alias']);

        if ($alias != null){

            $qb->leftJoin('e.aliases','a');
            $qb->andWhere("LOWER(a.alias) LIKE '%$alias%'");

        }

        // numeros de telephone
        $telephone = strtolower($data['telephone']);

        if ($telephone != null){

            $qb->leftJoin('e.telephone','t');
            $qb->andWhere("LOWER(t.numero) LIKE '%$telephone%'");
        }


        // sexe
        $sexe = $data['sexe'];
        if ($sexe != null){
            $qb->andWhere("e.sexe = :sexe");
            $qb->setParameter('sexe', $sexe);
        }


        // dateNaissance
        $dateNaissance = $data['dateNaissance'];
        if ($dateNaissance != null){
            $qb->andWhere("e.dateNaissance = :dateNaissance");
            $qb->setParameter('dateNaissance', $dateNaissance);
        }



        // numPassport
        $numPassport = strtolower($data['numPassport']);
        if ($numPassport != null){
            $qb->andWhere("LOWER(e.numPassport) LIKE '%$numPassport%'");
        }


        // numCarte

        $numCarte = strtolower($data['numCarte']);
        if ($numPassport != null){
            $qb->andWhere("LOWER(e.numCarte) LIKE '%$numCarte%'");
        }



        // nationalite
        $nationalite = $data['nationalite'];
        if ($nationalite != null){
            $qb->andWhere("e.nationalite = :nationalite");
            $qb->setParameter('nationalite', $nationalite);
        }



        // adresse
        $adresse = strtolower($data['adresse']);
        if ($adresse != null){
            $qb->andWhere("LOWER(e.adresse) LIKE '%$adresse%'");
        }


        // otherInfos
        $otherInfos = strtolower($data['otherInfos']);
        if ($otherInfos != null){
            $qb->andWhere("LOWER(e.otherInfos) LIKE '%$adresse%'");
        }


        return $qb->getQuery()->getResult();


    }

}
