<?php

namespace Projet\UserBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

 /**
 * @ORM\Entity()
 * @ORM\Table(name="satisfaction")
 * @ORM\Entity(repositoryClass="Projet\UserBundle\Repository\SatisfactionRepository")
 */
class Satisfaction
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
    public $qualite;

    /**
     * @ORM\Column(type="string")
     */
    public $proprote;
    /**
     * @ORM\Column(type="string")
     */
    public $respect;
    /**
    * @var DateTime
    *
    * @ORM\Column(type="datetime")
    */
    public $date;
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
     * Set qualite
     *
     * @param string $qualite
     *
     * @return Satisfaction
     */
    public function setQualite($qualite)
    {
        $this->qualite = $qualite;

        return $this;
    }

    /**
     * Get qualite
     *
     * @return string
     */
    public function getQualite()
    {
        return $this->qualite;
    }

    /**
     * Set proprote
     *
     * @param string $proprote
     *
     * @return Satisfaction
     */
    public function setProprote($proprote)
    {
        $this->proprote = $proprote;

        return $this;
    }

    /**
     * Get proprote
     *
     * @return string
     */
    public function getProprote()
    {
        return $this->proprote;
    }

    /**
     * Set respect
     *
     * @param string $respect
     *
     * @return Satisfaction
     */
    public function setRespect($respect)
    {
        $this->respect = $respect;

        return $this;
    }

    /**
     * Get respect
     *
     * @return string
     */
    public function getRespect()
    {
        return $this->respect;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Satisfaction
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->prestations = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set client
     *
     * @param \Projet\UserBundle\Entity\Client $client
     *
     * @return Satisfaction
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
     * Add prestation
     *
     * @param \Projet\UserBundle\Entity\Prestation $prestation
     *
     * @return Satisfaction
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

    /**
     * Set ouvrier
     *
     * @param \Projet\UserBundle\Entity\Ouvrier $ouvrier
     *
     * @return Satisfaction
     */
    public function setOuvrier(\Projet\UserBundle\Entity\Ouvrier $ouvrier)
    {
        $this->ouvrier = $ouvrier;

        return $this;
    }

    /**
     * Get ouvrier
     *
     * @return \Projet\UserBundle\Entity\Ouvrier
     */
    public function getOuvrier()
    {
        return $this->ouvrier;
    }
}
