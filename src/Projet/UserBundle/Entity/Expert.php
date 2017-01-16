<?php
namespace Projet\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity()
* @ORM\Table(name="expert")
* @ORM\Entity(repositoryClass="Projet\UserBundle\Repository\ExpertRepository")
*/
class Expert extends Personne
{

     /**
     * @ORM\Column(type="boolean")
     */
    public $disponible;
}
