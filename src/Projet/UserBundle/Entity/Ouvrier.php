<?php
namespace Projet\UserBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Projet\UserBundle\Repository\OuvrierRepository;

/**
* @ORM\Entity(repositoryClass="OuvrierRepository")
*/
class Ouvrier{
    
    
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;
    
    /**
     * @ORM\Column(type="string")
     */
    public $nom;
    
    /**
     * @ORM\Column(type="string")
     */
    public $prenom;
    
    /**
     * @ORM\Column(type="boolean")
     */
    public $disponible;
  
    
  
   /**
     * @ORM\OneToMany(targetEntity="Demande",mappedBy="ouvrier")
    */
     public $demandes;
     
     /**
     * @ORM\OneToMany(targetEntity="Commande",mappedBy="ouvrier")
    */
     public $commandes;
  
     /**
      * @ORM\OneToMany(targetEntity="Tarif",mappedBy="ouvrier")
      */
     public $tarifs;

     public function __construct() {
         $this->demandes = new ArrayCollection();
         $this->commandes = new ArrayCollection();
         $this->tarifs = new ArrayCollection();
     }
     
     public function addDemande($demande) {
         $this->demandes->add($demande);
     }
     
     public function addCommande($commande) {
         $this->commandes->add($commande);
     }
     
     public function addTarif($tarif){
         $this->tarifs->add($tarif);
     }

     
     function setId($id) {
         $this->id = $id;
     }

     function setNom($nom) {
         $this->nom = $nom;
     }

     function setPrenom($prenom) {
         $this->prenom = $prenom;
     }

     function setDisponible($disponible) {
         $this->disponible = $disponible;
     }

     function setDemandes($demandes) {
         $this->demandes = $demandes;
     }

     function setCommandes($commandes) {
         $this->commandes = $commandes;
     }

     function setTarifs($tarifs) {
         $this->tarifs = $tarifs;
     }


}
