<?php
namespace Projet\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity()
* @ORM\Table(name="client")
* @ORM\Entity(repositoryClass="Projet\UserBundle\Repository\ClientRepository")
*/
class Client extends Personne
{

   
}
