<?php

namespace Projet\UserBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

 /**
 * @ORM\Entity()
 * @ORM\Table(name="devis")
 * @ORM\Entity(repositoryClass="Projet\UserBundle\Repository\DevisRepository")
 */
class Devis
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
    public $etat;

    /**
     * @ORM\Column(type="float")
     */
    public $montantOuvrier;
    /**
     * @ORM\Column(type="float")
     */
    public $fraisMarketing;

}
