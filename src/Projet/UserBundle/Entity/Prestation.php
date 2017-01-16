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
    public $nomPrestation;

    /**
     * @ORM\Column(type="string")
     */
    public $descriptionPrestation;
    /**
     * @ORM\Column(type="string")
     */
    public $urlImage;

    

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nomPrestation
     *
     * @param string $nomPrestation
     *
     * @return Prestation
     */
    public function setNomPrestation($nomPrestation)
    {
        $this->nomPrestation = $nomPrestation;

        return $this;
    }

    /**
     * Get nomPrestation
     *
     * @return string
     */
    public function getNomPrestation()
    {
        return $this->nomPrestation;
    }

    /**
     * Set descriptionPrestation
     *
     * @param string $descriptionPrestation
     *
     * @return Prestation
     */
    public function setDescriptionPrestation($descriptionPrestation)
    {
        $this->descriptionPrestation = $descriptionPrestation;

        return $this;
    }

    /**
     * Get descriptionPrestation
     *
     * @return string
     */
    public function getDescriptionPrestation()
    {
        return $this->descriptionPrestation;
    }

    /**
     * Set urlImage
     *
     * @param string $urlImage
     *
     * @return Prestation
     */
    public function setUrlImage($urlImage)
    {
        $this->urlImage = $urlImage;

        return $this;
    }

    /**
     * Get urlImage
     *
     * @return string
     */
    public function getUrlImage()
    {
        return $this->urlImage;
    }
}
