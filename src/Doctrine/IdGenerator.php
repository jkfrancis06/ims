<?php


namespace App\Doctrine;


use Doctrine\ORM\EntityManager;
use Ramsey\Uuid\Uuid;

class IdGenerator extends \Doctrine\ORM\Id\AbstractIdGenerator
{

    /**
     * @inheritDoc
     */
    public function generate(EntityManager $em, $entity)
    {
        $gen_id = 'AFF-DNE-'.time().'-'.random_int(100, 999999);;

        if (null !== $em->getRepository(get_class($entity))->findOneBy(['numeroMatricule' => $gen_id])) {
            $gen_id = $this->generate($em, $entity);
        }

        return $gen_id;

        // TODO: Implement generate() method.
    }
}