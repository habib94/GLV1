<?php
namespace Projet\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Serializable;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;

/**
 * @ORM\Entity(repositoryClass="Projet\UserBundle\Repository\CompteRepository")
 */
class Compte implements Serializable, AdvancedUserInterface{
    
     /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;

    
    /**
     *
     * @ORM\Column(type="string", length=60)
     */
    public $email;
    

    /**
     * @ORM\Column(type="string", length=300)
     */
    public $motdepasse;
    
    /**
     * @var Role le role de l'utilisateur
     * @ORM\ManyToOne(targetEntity="Role",fetch="EAGER")
     * @ORM\JoinColumn(name="role_id", referencedColumnName="id")
     */
    public $role;
    
    /**
     *  @ORM\OneToOne(targetEntity="Client",inversedBy="compte")
     *  @ORM\JoinColumn(name="client_id",referencedColumnName="id")
     */
    public $client;
   
    public function __construct() {
    }
    
    public static function construct($email,$motdepasse){
        $compte = new Compte();
        $compte->email = $email;
        $compte->motdepasse = $motdepasse;
        return $compte;
    }

     

    public function getUsername()
    {
        return $this->email;
    }

    public function getSalt()
    {
        return null;
    }

    public function getPassword()
    {
        return $this->motdepasse;
    }

    public function getRoles()
    {
        return array($this->role->getNom());
    }

    public function eraseCredentials()
    {
    }

    /** @seeSerializablee::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->email,
            $this->motdepasse,
            // see section on salt below
            // $this->salt,
        ));
    }

    /** @seeSerializablee::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->email,
            $this->motdepasse,
            // see section on salt below
            // $this->salt
        ) = unserialize($serialized);
    }

  

    public function isAccountNonExpired() {
        return true;
    }

    public function isAccountNonLocked() {
        return true;
    }

    public function isCredentialsNonExpired() {
        return true;
    }

    function getId() {
        return $this->id;
    }

    function getEmail() {
        return $this->email;
    }

    function getMotdepasse() {
        return $this->motdepasse;
    }

    function getRole() {
        return $this->role;
    }


    function setId($id) {
        $this->id = $id;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setMotdepasse($motdepasse) {
        $this->motdepasse = $motdepasse;
    }

    function setRole(Role $role) {
        $this->role = $role;
    }

    function setIsActive($isActive) {
        $this->isActive = $isActive;
    }

    public function isEnabled() {
        return true;
    }
    
    function getClient() {
        return $this->client;
    }

    function setClient($client) {
        $this->client = $client;
    }



}