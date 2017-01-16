<?php
namespace Projet\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

    /**
     * @ORM\MappedSuperclass
     */
abstract class Notification
{   
    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;
   
    /**
     * @ORM\Column(type="string")
     */
    public $description;

    /**
    * @var DateTime
    *
    * @ORM\Column(type="datetime")
    */
    public $date;
   
}
