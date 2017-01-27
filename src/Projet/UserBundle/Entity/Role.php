<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Projet\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity 
 */
class Role {
    
        
    public static $ROLE_CLIENT = "ROLE_CLIENT";
    
    public static $ROLE_AGENT_ADMINISTRATIF = "ROLE_AGENT_ADMINISTRATIF";
    
    public static $ROLE_AGENT_TECHNIQUE = "ROLE_AGENT_TECHNIQUE";
    


    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;
    
    /**
     *
     * @ORM\Column(type="string", length=25)
     */
    public $nom;
    
    function __construct($nom) {
        $this->nom = $nom;
    }

    
    function getId() {
        return $this->id;
    }

    function getNom() {
        return $this->nom;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }


    
}
