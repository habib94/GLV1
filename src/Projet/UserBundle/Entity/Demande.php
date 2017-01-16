<?php
namespace Projet\UserBundle\Entity;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;

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
}
