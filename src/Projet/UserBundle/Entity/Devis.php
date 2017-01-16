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
}
