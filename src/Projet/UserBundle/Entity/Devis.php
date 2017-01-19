<?php

namespace Projet\UserBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Projet\UserBundle\Repository\DevisRepository;

 /**
 * @ORM\Entity(repositoryClass="Projet\UserBundle\Repository\DevisRepository")
 */
class Devis{
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    public $id;

    /**
     * @ORM\Column(type="string")
     */
    public $etat;

    /**
     * @ORM\Column(type="float")
     */
    public $montantTotal;

    
    /**
     * @ORM\ManyToMany(targetEntity="LigneDevis",cascade={"persist"})
     * @ORM\JoinTable(name="devis_lignedevis",
     *      joinColumns={@ORM\JoinColumn(name="devis_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="lignedevis_id", referencedColumnName="id", unique=true)}
     *      )
     */
     public $lignesdevis;
     
     public function __construct() {
         $this->lignesdevis = new ArrayCollection();
     }
     
     function addLigneDevis($ligneDevis) {
         $this->lignesdevis->add($ligneDevis);
     }
   
     
     function setId($id) {
         $this->id = $id;
     }

     function setEtat($etat) {
         $this->etat = $etat;
     }

     function getMontantTotal() {
         return $this->montantTotal;
     }



     function setMontantTotal($montantTotal) {
         $this->montantTotal = $montantTotal;
     }

     function setLignesdevis($lignesdevis) {
         $this->lignesdevis = $lignesdevis;
     }

     
     function getId() {
         return $this->id;
     }

     function getEtat() {
         return $this->etat;
     }

     function getLignesdevis() {
         return $this->lignesdevis;
     }


}
