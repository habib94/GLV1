<?php

namespace Projet\UserBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

 /**
 * @ORM\Entity()
 * @ORM\Table(name="commande")
 * @ORM\Entity(repositoryClass="Projet\UserBundle\Repository\CommandeRepository")
 */
class Commande
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    public $id;

   /**
    * @var DateTime
    *
    * @ORM\Column(type="datetime")
     */
    public $datePrestation;

}
