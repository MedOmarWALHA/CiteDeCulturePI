<?php

namespace BibliothequeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * auteur
 *
 * @ORM\Table(name="auteur")
 * @ORM\Entity(repositoryClass="BibliothequeBundle\Repository\auteurRepository")
 */
class auteur
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
     * @ORM\Column(name="nom", type="string", length=50)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=50)
     */
    private $prenom;

    /**
     * @var \Datetime
     *
     * @ORM\Column(name="datenaissance", type="date")
     */
    private $datenaissance;

    /**
     * @var string
     *
     * @ORM\Column(name="nationalite", type="string", length=50)
     */
    private $nationalite;


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
     * Set nom
     *
     * @param string $nom
     *
     * @return auteur
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
     * @return auteur
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
     * Set datenaissance
     *
     * @param \DateTime $datenaissance
     *
     * @return auteur
     */
    public function setDatenaissance($datenaissance)
    {
        $this->datenaissance = $datenaissance;

        return $this;
    }

    /**
     * Get datenaissance
     *
     * @return \DateTime
     */
    public function getDatenaissance()
    {
        return $this->datenaissance;
    }

    /**
     * Set nationalite
     *
     * @param string $nationalite
     *
     * @return auteur
     */
    public function setNationalite($nationalite)
    {
        $this->nationalite = $nationalite;

        return $this;
    }

    /**
     * Get nationalite
     *
     * @return string
     */
    public function getNationalite()
    {
        return $this->nationalite;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->liv = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add liv
     *
     * @param \BibliothequeBundle\Entity\livre $liv
     *
     * @return auteur
     */
    public function addLiv(\BibliothequeBundle\Entity\livre $liv)
    {
        $this->liv[] = $liv;

        return $this;
    }

    /**
     * Remove liv
     *
     * @param \BibliothequeBundle\Entity\livre $liv
     */
    public function removeLiv(\BibliothequeBundle\Entity\livre $liv)
    {
        $this->liv->removeElement($liv);
    }

    /**
     * Get liv
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLiv()
    {
        return $this->liv;
    }

    /**
     * Add livaut
     *
     * @param \BibliothequeBundle\Entity\livre $livaut
     *
     * @return auteur
     */
    public function addLivaut(\BibliothequeBundle\Entity\livre $livaut)
    {
        $this->livaut[] = $livaut;

        return $this;
    }

    /**
     * Remove livaut
     *
     * @param \BibliothequeBundle\Entity\livre $livaut
     */
    public function removeLivaut(\BibliothequeBundle\Entity\livre $livaut)
    {
        $this->livaut->removeElement($livaut);
    }

    /**
     * Get livaut
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLivaut()
    {
        return $this->livaut;
    }
}
