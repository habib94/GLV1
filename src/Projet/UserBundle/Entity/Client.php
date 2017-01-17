<?php
namespace Projet\UserBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Projet\UserBundle\Repository\ClientRepository;

/**
* @ORM\Entity(repositoryClass="Projet\UserBundle\Repository\ClientRepository")
*/
class Client{

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
     * @ORM\OneToMany(targetEntity="Demande",mappedBy="client")
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

     function setDemandes($demandes) {
         $this->demandes = $demandes;
     }


}
