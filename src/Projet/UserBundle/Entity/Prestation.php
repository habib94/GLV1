<?php

namespace Projet\UserBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

 /**
 * @ORM\Entity()
 * @ORM\Table(name="prestations")
 * @ORM\Entity(repositoryClass="Projet\UserBundle\Repository\PrestationRepository")
 */
class Prestation
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
    public $nom;

    /**
     * @ORM\Column(type="string")
     */
    public $description;
    /**
     * @ORM\Column(type="string")
     */
    public $urlImage;
   /**
   * @ORM\OneToMany(targetEntity="Projet\UserBundle\Entity\LigneDevis", mappedBy="Prestation")
   * @ORM\JoinColumn(nullable=false)
   */
     public $lignedevis;

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
     * Set nom
     *
     * @param string $nom
     *
     * @return Prestation
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Prestation
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
     * Set urlImage
     *
     * @param string $urlImage
     *
     * @return Prestation
     */
    public function setUrlImage($urlImage)
    {
        $this->urlImage = $urlImage;

        return $this;
    }

    /**
     * Get urlImage
     *
     * @return string
     */
    public function getUrlImage()
    {
        return $this->urlImage;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->lignedevis = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add lignedevi
     *
     * @param \Projet\UserBundle\Entity\LigneDevis $lignedevi
     *
     * @return Prestation
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
}
