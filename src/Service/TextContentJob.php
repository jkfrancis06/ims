<?php

namespace App\Service;

use App\Entity\Entites;
use App\Entity\Personne;
use Doctrine\ORM\EntityManagerInterface;

class TextContentJob
{

    private const PATTERN = '/\[{2}(.*?)\]{2}/is';

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    public function parseTextContent($text) {

        return preg_replace_callback($this::PATTERN,function ($matches){

            $string = str_replace(array('[[',']]'),'',$matches[0]);

            $entite = $this->entityManager->getRepository(Entites::class)->find(intval($string));

            if ($entite == null){
                return [];
            }else{
                if ($entite instanceof Personne){
                    return '['.$entite->getNom().' '.$entite->getPrenom().']';
                }
                return '['.$entite->getDescription().' '.$entite->getDescription2().']';
            }
        },$text);
    }

}