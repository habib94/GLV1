<?php
namespace Projet\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

    /**
     * @ORM\MappedSuperclass
     */
abstract class Personne
{   
    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;
   
    /**
     * @ORM\Column(type="string")
     */
    public $nom;

    /**
     * @ORM\Column(type="string")
     */
    public $prenom;

    /**
     * @ORM\Column(type="string")
     */
    public $adresse;

    /**
     * @ORM\Column(type="string")
     */
    public $tel;

    /**
     * @ORM\Column(type="string")
     */
    public $email;
    
      /**
     * @ORM\Column(type="string")
     */
    public $motdepasse;
   
}
