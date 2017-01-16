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
}
