<?php

namespace BibliothequeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * emprunt
 *
 * @ORM\Table(name="emprunt")
 * @ORM\Entity(repositoryClass="BibliothequeBundle\Repository\empruntRepository")
 */
class emprunt
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
     * @var \DateTime
     *
     * @ORM\Column(name="Datedebut", type="datetime")
     */
    private $datedebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datefin", type="datetime")
     */
    private $datefin;

    /**
     * @var bool
     *
     * @ORM\Column(name="rendu", type="boolean")
     */
    private $rendu;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="livre")
     * @ORM\JoinColumn(name="id_livre", referencedColumnName="id")
     */
    private $livre;



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
     * Set datedebut
     *
     * @param \DateTime $datedebut
     *
     * @return emprunt
     */
    public function setDatedebut($datedebut)
    {
        $this->datedebut = $datedebut;

        return $this;
    }

    /**
     * Get datedebut
     *
     * @return \DateTime
     */
    public function getDatedebut()
    {
        return $this->datedebut;
    }

    /**
     * Set datefin
     *
     * @param \DateTime $datefin
     *
     * @return emprunt
     */
    public function setDatefin($datefin)
    {
        $this->datefin = $datefin;

        return $this;
    }

    /**
     * Get datefin
     *
     * @return \DateTime
     */
    public function getDatefin()
    {
        return $this->datefin;
    }

    /**
     * Set rendu
     *
     * @param boolean $rendu
     *
     * @return emprunt
     */
    public function setRendu($rendu)
    {
        $this->rendu = $rendu;

        return $this;
    }

    /**
     * Get rendu
     *
     * @return boolean
     */
    public function getRendu()
    {
        return $this->rendu;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return emprunt
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set livre
     *
     * @param \BibliothequeBundle\Entity\livre $livre
     *
     * @return emprunt
     */
    public function setLivre(\BibliothequeBundle\Entity\livre $livre = null)
    {
        $this->livre = $livre;

        return $this;
    }

    /**
     * Get livre
     *
     * @return \BibliothequeBundle\Entity\livre
     */
    public function getLivre()
    {
        return $this->livre;
    }
}
