<?php

namespace BibliothequeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * dommaine
 *
 * @ORM\Table(name="dommaine")
 * @ORM\Entity(repositoryClass="BibliothequeBundle\Repository\dommaineRepository")
 */
class dommaine
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
     * @ORM\Column(name="libelle", type="string", length=50)
     */
    private $libelle;


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
     * Set libelle
     *
     * @param string $libelle
     *
     * @return dommaine
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
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
     * @return dommaine
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
     * Add livdom
     *
     * @param \BibliothequeBundle\Entity\livre $livdom
     *
     * @return dommaine
     */
    public function addLivdom(\BibliothequeBundle\Entity\livre $livdom)
    {
        $this->livdom[] = $livdom;

        return $this;
    }

    /**
     * Remove livdom
     *
     * @param \BibliothequeBundle\Entity\livre $livdom
     */
    public function removeLivdom(\BibliothequeBundle\Entity\livre $livdom)
    {
        $this->livdom->removeElement($livdom);
    }

    /**
     * Get livdom
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLivdom()
    {
        return $this->livdom;
    }
}
