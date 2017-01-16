<?php
namespace Projet\UserBundle\Entity;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity()
* @ORM\Table(name="demande")
* @ORM\Entity(repositoryClass="Projet\UserBundle\Repository\DemandeRepository")
*/
class Demande 
{
    /**
   * @ORM\ManyToOne(targetEntity="Projet\UserBundle\Entity\Client")
   * @ORM\JoinColumn(nullable=false)
   */
  public $client;
  
  /**
   * @ORM\ManyToMany(targetEntity="Projet\UserBundle\Entity\Prestation", cascade={"persist"})
   */
  private $prestations;
     /**
     * @var int
     *
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
     * Set client
     *
     * @param \Projet\UserBundle\Entity\Client $client
     *
     * @return Demande
     */
    public function setClient(\Projet\UserBundle\Entity\Client $client)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return \Projet\UserBundle\Entity\Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Demande
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set datePrestation
     *
     * @param \DateTime $datePrestation
     *
     * @return Demande
     */
    public function setDatePrestation($datePrestation)
    {
        $this->datePrestation = $datePrestation;

        return $this;
    }

    /**
     * Get datePrestation
     *
     * @return \DateTime
     */
    public function getDatePrestation()
    {
        return $this->datePrestation;
    }

    /**
     * Set dateDemande
     *
     * @param \DateTime $dateDemande
     *
     * @return Demande
     */
    public function setDateDemande($dateDemande)
    {
        $this->dateDemande = $dateDemande;

        return $this;
    }

    /**
     * Get dateDemande
     *
     * @return \DateTime
     */
    public function getDateDemande()
    {
        return $this->dateDemande;
    }

    /**
     * Set etat
     *
     * @param string $etat
     *
     * @return Demande
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return string
     */
    public function getEtat()
    {
        return $this->etat;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->prestations = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add prestation
     *
     * @param \Projet\UserBundle\Entity\Prestation $prestation
     *
     * @return Demande
     */
    public function addPrestation(\Projet\UserBundle\Entity\Prestation $prestation)
    {
        $this->prestations[] = $prestation;

        return $this;
    }

    /**
     * Remove prestation
     *
     * @param \Projet\UserBundle\Entity\Prestation $prestation
     */
    public function removePrestation(\Projet\UserBundle\Entity\Prestation $prestation)
    {
        $this->prestations->removeElement($prestation);
    }

    /**
     * Get prestations
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPrestations()
    {
        return $this->prestations;
    }
}
