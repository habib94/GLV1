<?php
namespace Projet\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Projet\UserBundle\Repository\CompteRepository;

/**
 * @ORM\Entity(repositoryClass="CompteRepository")
 */
class Compte{

    
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;
    
    
    /**
     * @ORM\Column(type="string")
     */
    public $email;
    
      /**
     * @ORM\Column(type="string")
     */
    public $motdepasse;
   
    
    function setId($id) {
        $this->id = $id;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setMotdepasse($motdepasse) {
        $this->motdepasse = $motdepasse;
    }


}
