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
}
