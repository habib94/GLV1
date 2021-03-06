<?php

namespace Projet\UserBundle\Repository;


use Doctrine\ORM\EntityRepository;

/**
 * OuvrierRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class OuvrierRepository extends EntityRepository
{
    
     public function findDispo($b){ 
        $qb = $this->createQueryBuilder('o');

        $qb ->where('o.disponible = :b')->setParameter('b', $b);

        return $qb->getQuery()->getResult();
    }
    
}
