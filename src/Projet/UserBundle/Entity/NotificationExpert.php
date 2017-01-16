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

   
}
