<?php

namespace Projet\UserBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

 /**
 * @ORM\Entity()
 * @ORM\Table(name="devis")
 * @ORM\Entity(repositoryClass="Projet\UserBundle\Repository\DevisRepository")
 */
class Devis
{
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
    public $montantOuvrier;
    /**
     * @ORM\Column(type="float")
     */
    public $fraisMarketing;

   /**
   * @ORM\OneToOne(targetEntity="Projet\UserBundle\Entity\Demande", cascade={"persist"})
   */
     private $demande;
    /**
   * @ORM\OneToMany(targetEntity="Projet\UserBundle\Entity\LigneDevis", mappedBy="Projet\UserBundle\Entity\Devis")
   * @ORM\JoinColumn(nullable=false)
   */
     public $lignedevis;
     /**
   * @ORM\ManyToOne(targetEntity="Projet\UserBundle\Entity\Prestation")
   * @ORM\JoinColumn(nullable=false)
   */
     public $prestation;
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
     * Set etat
     *
     * @param string $etat
     *
     * @return Devis
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
     * Set montantOuvrier
     *
     * @param float $montantOuvrier
     *
     * @return Devis
     */
    public function setMontantOuvrier($montantOuvrier)
    {
        $this->montantOuvrier = $montantOuvrier;

        return $this;
    }

    /**
     * Get montantOuvrier
     *
     * @return float
     */
    public function getMontantOuvrier()
    {
        return $this->montantOuvrier;
    }

    /**
     * Set fraisMarketing
     *
     * @param float $fraisMarketing
     *
     * @return Devis
     */
    public function setFraisMarketing($fraisMarketing)
    {
        $this->fraisMarketing = $fraisMarketing;

        return $this;
    }

    /**
     * Get fraisMarketing
     *
     * @return float
     */
    public function getFraisMarketing()
    {
        return $this->fraisMarketing;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->lignedevis = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set demande
     *
     * @param \Projet\UserBundle\Entity\Demande $demande
     *
     * @return Devis
     */
    public function setDemande(\Projet\UserBundle\Entity\Demande $demande = null)
    {
        $this->demande = $demande;

        return $this;
    }

    /**
     * Get demande
     *
     * @return \Projet\UserBundle\Entity\Demande
     */
    public function getDemande()
    {
        return $this->demande;
    }

    /**
     * Add lignedevi
     *
     * @param \Projet\UserBundle\Entity\LigneDevis $lignedevi
     *
     * @return Devis
     */
    public function addLignedevi(\Projet\UserBundle\Entity\LigneDevis $lignedevi)
    {
        $this->lignedevis[] = $lignedevi;

        return $this;
    }

    /**
     * Remove lignedevi
     *
     * @param \Projet\UserBundle\Entity\LigneDevis $lignedevi
     */
    public function removeLignedevi(\Projet\UserBundle\Entity\LigneDevis $lignedevi)
    {
        $this->lignedevis->removeElement($lignedevi);
    }

    /**
     * Get lignedevis
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLignedevis()
    {
        return $this->lignedevis;
    }

    /**
     * Set prestation
     *
     * @param \Projet\UserBundle\Entity\Prestation $prestation
     *
     * @return Devis
     */
    public function setPrestation(\Projet\UserBundle\Entity\Prestation $prestation)
    {
        $this->prestation = $prestation;

        return $this;
    }

    /**
     * Get prestation
     *
     * @return \Projet\UserBundle\Entity\Prestation
     */
    public function getPrestation()
    {
        return $this->prestation;
    }
}
