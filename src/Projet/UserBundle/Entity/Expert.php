<?php
namespace Projet\UserBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Projet\UserBundle\Repository\ExpertRepository;

/**
* @ORM\Entity(repositoryClass="Projet\UserBundle\Repository\ExpertRepository")
*/
class Expert{
    
    
    /**
     * @ORM\Column(type="integer")
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
     * @ORM\Column(type="string")
     */
    public $adresse;

    /**
     * @ORM\Column(type="string")
     */
    public $tel;

     /**
     * @ORM\Column(type="boolean")
     */
    public $disponible;
    
    /**
     * @ORM\OneToMany(targetEntity="Demande",mappedBy="expert")
    */
     public $demandes;
     
     public function __construct() {
         $this->demandes = new ArrayCollection();
     }
     
     public function addDemande($demande) {
         $this->demandes->add($demande);
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

     function setAdresse($adresse) {
         $this->adresse = $adresse;
     }

     function setTel($tel) {
         $this->tel = $tel;
     }

     function setDisponible($disponible) {
         $this->disponible = $disponible;
     }

     function setDemandes($demandes) {
         $this->demandes = $demandes;
     }



   
}
