<?php

namespace Projet\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

 /**
 * @ORM\Entity()
 * @ORM\Table(name="prestations")
 * @ORM\Entity(repositoryClass="Projet\UserBundle\Repository\PrestationRepository")
 */
class Prestation
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
    public $nom;

    /**
     * @ORM\Column(type="string")
     */
    public $description;
    /**
     * @ORM\Column(type="string")
     */
    public $urlImage;
    
   
    function setId($id) {
        $this->id = $id;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function setUrlImage($urlImage) {
        $this->urlImage = $urlImage;
    }



    
}
