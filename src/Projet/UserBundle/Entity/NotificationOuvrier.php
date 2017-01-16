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

   
}
