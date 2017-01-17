<?php

namespace Projet\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Projet\UserBundle\Repository\CommandeRepository;

 /**
 * @ORM\Entity(repositoryClass="Projet\UserBundle\Repository\CommandeRepository")
 */
class Commande{
    
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;

    
    /**
    * @ORM\OneToOne(targetEntity="Satisfaction",mappedBy="commande")
    */
   public $satisfaction;

     /**
    * @ORM\ManyToOne(targetEntity="Ouvrier",inversedBy="commandes")
    * @ORM\JoinColumn(name="ouvrier_id",referencedColumnName="id")
    */
   public $ouvrier;
   
   /**
    * @ORM\OneToOne(targetEntity="Demande",inversedBy="commande")
    * @ORM\JoinColumn(name="demande_id",referencedColumnName="id")
    */
   public $demande;
   
   
  
   function setId($id) {
       $this->id = $id;
   }

   function setSatisfaction($satisfaction) {
       $this->satisfaction = $satisfaction;
   }

   function setOuvrier($ouvrier) {
       $this->ouvrier = $ouvrier;
   }

   function setDemande($demande) {
       $this->demande = $demande;
   }


}
