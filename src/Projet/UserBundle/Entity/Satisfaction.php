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

}
