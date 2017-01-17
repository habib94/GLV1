<?php
namespace Projet\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity()
* @ORM\Table(name="notificationOuvrier")
* @ORM\Entity(repositoryClass="Projet\UserBundle\Repository\NotificationOuvrierRepository")
*/
class NotificationOuvrier extends Notification
{

   /**
   * @ORM\ManyToOne(targetEntity="Projet\UserBundle\Entity\Ouvrier")
   * @ORM\JoinColumn(nullable=false)
   */
    private $ouvrier;

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
     * @return NotificationOuvrier
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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return NotificationOuvrier
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
     * Set ouvrier
     *
     * @param \Projet\UserBundle\Entity\Ouvrier $ouvrier
     *
     * @return NotificationOuvrier
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
