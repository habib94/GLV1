<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Projet\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
* @ORM\Entity(repositoryClass="TarifRepository")
*/
class Tarif {

    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;
    
    /**
     * @ORM\Column(type="float")
     */
    public $prix;
    
    /**
     * @ORM\ManyToOne(targetEntity="Prestation")
     * @ORM\JoinColumn(name="prestation_id", referencedColumnName="id")
     */
    public $prestation;
    
    /**
     * @ORM\ManyToOne(targetEntity="Ouvrier",inversedBy="tarifs")
     * @ORM\JoinColumn(name="ouvrier_id", referencedColumnName="id")
     */
    public $ouvrier;
    
    
    function setId($id) {
        $this->id = $id;
    }

    function setPrix($prix) {
        $this->prix = $prix;
    }

    function setPrestation($prestation) {
        $this->prestation = $prestation;
    }

    function setOuvrier($ouvrier) {
        $this->ouvrier = $ouvrier;
    }


}
