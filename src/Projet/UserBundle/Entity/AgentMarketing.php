<?php
namespace Projet\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity()
* @ORM\Table(name="agentmarketing")
* @ORM\Entity(repositoryClass="Projet\UserBundle\Repository\AgentmarketingRepository")
*/
class AgentMarketing extends Personne
{

   
}
