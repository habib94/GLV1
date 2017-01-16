<?php

namespace Projet\UserBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

 /**
 * @ORM\Entity()
 * @ORM\Table(name="commande")
 * @ORM\Entity(repositoryClass="Projet\UserBundle\Repository\CommandeRepository")
 */
class Commande
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    public $id;

   /**
    * @var DateTime
    *
    * @ORM\Column(type="datetime")
     */
    public $datePrestation;
   /**
   * @ORM\OneToOne(targetEntity="Projet\UserBundle\Entity\Devis", cascade={"persist"})
   */
  private $devis;
/**
   * @ORM\ManyToOne(targetEntity="Projet\UserBundle\Entity\Ouvrier")
   * @ORM\JoinColumn(nullable=false)
   */
  public $ouvrier;
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
     * Set datePrestation
     *
     * @param \DateTime $datePrestation
     *
     * @return Commande
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
}
