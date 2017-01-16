<?php
namespace Projet\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity()
* @ORM\Table(name="ouvrier")
* @ORM\Entity(repositoryClass="Projet\UserBundle\Repository\OuvrierRepository")
*/
class Ouvrier extends Personne
{
/**
     * @ORM\Column(type="boolean")
     */
    public $disponible;
   
}

