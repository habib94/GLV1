<?php

namespace Projet\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Projet\UserBundle\Repository\SatisfactionRepository;

 /**
 * @ORM\Entity(repositoryClass="Projet\UserBundle\Repository\SatisfactionRepository")
 */
class Satisfaction
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;

    /**
     * @ORM\Column(type="integer")
     */
    public $qualite;

    /**
     * @ORM\Column(type="integer")
     */
    public $proprote;
    /**
     * @ORM\Column(type="integer")
     */
    public $respect;
    
    
    
    /**
     * @ORM\OneToOne(targetEntity="Commande",inversedBy="satisfaction")
     * @ORM\JoinColumn(name="commande_id",referencedColumnName="id")
     */
    public $commande;
    
    function setId($id) {
        $this->id = $id;
    }

    function setQualite($qualite) {
        $this->qualite = $qualite;
    }

    function setProprote($proprote) {
        $this->proprote = $proprote;
    }

    function setRespect($respect) {
        $this->respect = $respect;
    }

    function setCommande($commande) {
        $this->commande = $commande;
    }


}
