<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Annonce
 *
 * @ORM\Table(name="annonce")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AnnonceRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Annonce
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="string", length=255)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateDepot", type="date")
     */
    private $dateDepot;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Utilisateur", inversedBy="annonces")
     */
    private $auteur;


    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Utilisateur", inversedBy="annonces_modif")
     */
    private $last_auteur;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return Annonce
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Annonce
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set dateDepot
     *
     * @param \DateTime $dateDepot
     *
     * @return Annonce
     */
    public function setDateDepot($dateDepot)
    {
        $this->dateDepot = $dateDepot;

        return $this;
    }

    /**
     * Get dateDepot
     *
     * @return \DateTime
     */
    public function getDateDepot()
    {
        return $this->dateDepot;
    }

    /**
     * Set auteur
     *
     * @param \AppBundle\Entity\Utilisateur $auteur
     *
     * @return Annonce
     */
    public function setAuteur(\AppBundle\Entity\Utilisateur $auteur = null)
    {
        $this->auteur = $auteur;

        return $this;
    }

    /**
     * Get auteur
     *
     * @return \AppBundle\Entity\Utilisateur
     */
    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * @ORM\PrePersist()
     */
    public function updateDateDepot()
    {
        $this->dateDepot = new \DateTime();
    }

    /**
     * Set lastAuteur
     *
     * @param \AppBundle\Entity\Utilisateur $lastAuteur
     *
     * @return Annonce
     */
    public function setLastAuteur(\AppBundle\Entity\Utilisateur $lastAuteur = null)
    {
        $this->last_auteur = $lastAuteur;

        return $this;
    }

    /**
     * Get lastAuteur
     *
     * @return \AppBundle\Entity\Utilisateur
     */
    public function getLastAuteur()
    {
        return $this->last_auteur;
    }
}
