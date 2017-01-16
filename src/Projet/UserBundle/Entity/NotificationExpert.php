<?php
namespace Projet\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity()
* @ORM\Table(name="notificationExpert")
* @ORM\Entity(repositoryClass="Projet\UserBundle\Repository\NotificationExpertRepository")
*/
class NotificationExpert extends Notification
{

   /**
   * @ORM\ManyToOne(targetEntity="Projet\UserBundle\Entity\Expert")
   * @ORM\JoinColumn(nullable=false)
   */
    private $expert;

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
     * @return NotificationExpert
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
     * @return NotificationExpert
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
