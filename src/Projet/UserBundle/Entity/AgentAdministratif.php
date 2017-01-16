<?php
namespace Projet\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity()
* @ORM\Table(name="agentadministratif")
* @ORM\Entity(repositoryClass="Projet\UserBundle\Repository\AgentAdministratifRepository")
*/
class AgentAdministratif extends Personne
{

   
}
