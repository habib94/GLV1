<?php

namespace Projet\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Projet\UserBundle\Repository\LigneDevisRepository;

/**
* @ORM\Entity(repositoryClass="Projet\UserBundle\Repository\LigneDevisRepository")
*/
class LigneDevis 
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;
    
    
    /**
     * @ORM\Column(type="float")
     */
    public $montant;
    
     /**
     * @ORM\ManyToOne(targetEntity="Prestation")
     * @ORM\JoinColumn(name="prestation_id", referencedColumnName="id")
     */
    public $prestation;
    
    function setId($id) {
        $this->id = $id;
    }

    function setMontant($montant) {
        $this->montant = $montant;
    }

    function setPrestation($prestation) {
        $this->prestation = $prestation;
    }


   
}
