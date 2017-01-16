<?php
namespace Projet\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity()
* @ORM\Table(name="agentTechnique")
* @ORM\Entity(repositoryClass="Projet\UserBundle\Repository\AgentTechniqueRepository")
*/
class AgentTechnique extends Personne
{

   
}
