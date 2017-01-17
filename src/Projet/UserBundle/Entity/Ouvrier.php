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
   /**
   * @ORM\OneToMany(targetEntity="Projet\UserBundle\Entity\Satisfaction", mappedBy="Ouvrier")
   * @ORM\JoinColumn(nullable=false)
   */
  public $satisfactions;
  /**
   * @ORM\OneToMany(targetEntity="Projet\UserBundle\Entity\Commande", mappedBy="Ouvrier")
   * @ORM\JoinColumn(nullable=false)
   */
  public $commandes;

    /**
     * Set disponible
     *
     * @param boolean $disponible
     *
     * @return Ouvrier
     */
    public function setDisponible($disponible)
    {
        $this->disponible = $disponible;

        return $this;
    }

    /**
     * Get disponible
     *
     * @return boolean
     */
    public function getDisponible()
    {
        return $this->disponible;
    }

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
     * Set nom
     *
     * @param string $nom
     *
     * @return Ouvrier
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Ouvrier
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Ouvrier
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set tel
     *
     * @param string $tel
     *
     * @return Ouvrier
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel
     *
     * @return string
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Ouvrier
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set motdepasse
     *
     * @param string $motdepasse
     *
     * @return Ouvrier
     */
    public function setMotdepasse($motdepasse)
    {
        $this->motdepasse = $motdepasse;

        return $this;
    }

    /**
     * Get motdepasse
     *
     * @return string
     */
    public function getMotdepasse()
    {
        return $this->motdepasse;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->satisfactions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->commandes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add satisfaction
     *
     * @param \Projet\UserBundle\Entity\Satisfaction $satisfaction
     *
     * @return Ouvrier
     */
    public function addSatisfaction(\Projet\UserBundle\Entity\Satisfaction $satisfaction)
    {
        $this->satisfactions[] = $satisfaction;

        return $this;
    }

    /**
     * Remove satisfaction
     *
     * @param \Projet\UserBundle\Entity\Satisfaction $satisfaction
     */
    public function removeSatisfaction(\Projet\UserBundle\Entity\Satisfaction $satisfaction)
    {
        $this->satisfactions->removeElement($satisfaction);
    }

    /**
     * Get satisfactions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSatisfactions()
    {
        return $this->satisfactions;
    }

    /**
     * Add commande
     *
     * @param \Projet\UserBundle\Entity\Commande $commande
     *
     * @return Ouvrier
     */
    public function addCommande(\Projet\UserBundle\Entity\Commande $commande)
    {
        $this->commandes[] = $commande;

        return $this;
    }

    /**
     * Remove commande
     *
     * @param \Projet\UserBundle\Entity\Commande $commande
     */
    public function removeCommande(\Projet\UserBundle\Entity\Commande $commande)
    {
        $this->commandes->removeElement($commande);
    }

    /**
     * Get commandes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCommandes()
    {
        return $this->commandes;
    }
}
