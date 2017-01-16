<?php

namespace Projet\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity()
* @ORM\Table(name="lignedevis")
* @ORM\Entity(repositoryClass="Projet\UserBundle\Repository\LigneDevisRepository")
*/
class LigneDevis 
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;
    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    public $montant;
    /**
   * @ORM\ManyToOne(targetEntity="Projet\UserBundle\Entity\Devis")
   * @ORM\JoinColumn(nullable=false)
   */
  public $devis;
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
     * Set montant
     *
     * @param integer $montant
     *
     * @return LigneDevis
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;

        return $this;
    }

    /**
     * Get montant
     *
     * @return integer
     */
    public function getMontant()
    {
        return $this->montant;
    }
}
