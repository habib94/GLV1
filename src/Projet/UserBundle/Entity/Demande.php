<?php
namespace Projet\UserBundle\Entity;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Projet\UserBundle\Repository\DemandeRepository;

/**
* @ORM\Entity(repositoryClass="Projet\UserBundle\Repository\DemandeRepository")
*/
class Demande {
    
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;

    /**
     * @ORM\Column(type="string")
     */
    public $description;
    /**
    * @var DateTime
    *
    * @ORM\Column(type="datetime")
     */
    public $datePrestation;

    /**
    * @var DateTime
    *
    * @ORM\Column(type="datetime")
    */
    public $dateDemande;
    
    
    /**
     * @ORM\Column(type="string")
     */
    public $etat;
    
    /**
    * @ORM\ManyToOne(targetEntity="Client",inversedBy="demandes")
    * @ORM\JoinColumn(name="client_id",referencedColumnName="id")
    */
   public $client;
   
   /**
    * @ORM\ManyToOne(targetEntity="Expert",inversedBy="demandes")
    * @ORM\JoinColumn(name="expert_id",referencedColumnName="id")
    */
   public $expert;
   
   /**
    * @ORM\ManyToOne(targetEntity="Ouvrier",inversedBy="demandes")
    * @ORM\JoinColumn(name="ouvrier_id",referencedColumnName="id")
    */
   public $ouvrier;

   /**
    * @ORM\ManyToMany(targetEntity="Prestation")
     * @ORM\JoinTable(name="demandes_prestations",
     *      joinColumns={@ORM\JoinColumn(name="demande_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="prestation_id", referencedColumnName="id")}
     *      )
    */
   public $prestations;
  
     /**
      *
      * @ORM\OneToOne(targetEntity="Devis")
      * @ORM\JoinColumn(name="devis_id", referencedColumnName="id")
      */
    public $devis;
  
    public function __construct() {
        $this->prestations = new ArrayCollection();
    }
    
    public function addPrestation($prestation) {
        $this->prestations->add($prestation);
    }
    
    function setId($id) {
        $this->id = $id;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function setDatePrestation(DateTime $datePrestation) {
        $this->datePrestation = $datePrestation;
    }

    function setDateDemande(DateTime $dateDemande) {
        $this->dateDemande = $dateDemande;
    }

    function setEtat($etat) {
        $this->etat = $etat;
    }

    function setClient($client) {
        $this->client = $client;
    }

    function setExpert($expert) {
        $this->expert = $expert;
    }

    function setOuvrier($ouvrier) {
        $this->ouvrier = $ouvrier;
    }

    function setPrestations($prestations) {
        $this->prestations = $prestations;
    }

    function setDevis($devis) {
        $this->devis = $devis;
    }


}
