<?php

namespace BibliothequeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Security\Core\Util\SecureRandom;
/**
 * livre
 *
 * @ORM\Table(name="livre")
 * @ORM\Entity(repositoryClass="BibliothequeBundle\Repository\livreRepository")
 */
class livre
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
     * @ORM\Column(name="titre", type="string", length=50)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="langue", type="string", length=50)
     */
    private $langue;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="annee", type="date")
     */
    private $annee;

    /**
     * @var int
     *
     * @ORM\Column(name="nombrepage", type="integer")
     */
    private $nombrepage;

    /**
     * @var int
     *
     * @ORM\Column(name="nombreimage", type="integer")
     */
    private $nombreimage;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateparution", type="date")
     */
    private $dateparution;

    /**
     * @var int
     *
     * @ORM\Column(name="nombreexemplaire", type="integer")
     */
    private $nombreexemplaire;

    // ...

    /**
     * @ORM\Column(type="string")
     *
     * @Assert\NotBlank(message="Please, upload the product brochure as a PDF file.")
     * @Assert\File(mimeTypes={ "application/pdf" })
     */

    private $image;

    /**
     * @ORM\Column(type="string")
     *
     */

    private $ProfilePictureFile;

    /**
     * @ORM\ManyToOne(targetEntity="auteur")
     * @ORM\JoinColumn(name="id_auteur",referencedColumnName="id")
     */
    private $auteur;
    /**
     * @ORM\ManyToOne(targetEntity="dommaine")
     * @ORM\JoinColumn(name="id_domaine",referencedColumnName="id")
     */
    private $dommaine;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->livdom = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set titre
     *
     * @param string $titre
     *
     * @return livre
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
     * Set langue
     *
     * @param string $langue
     *
     * @return livre
     */
    public function setLangue($langue)
    {
        $this->langue = $langue;

        return $this;
    }

    /**
     * Get langue
     *
     * @return string
     */
    public function getLangue()
    {
        return $this->langue;
    }

    /**
     * Set annee
     *
     * @param \DateTime $annee
     *
     * @return livre
     */
    public function setAnnee($annee)
    {
        $this->annee = $annee;

        return $this;
    }

    /**
     * Get annee
     *
     * @return \DateTime
     */
    public function getAnnee()
    {
        return $this->annee;
    }

    /**
     * Set nombrepage
     *
     * @param integer $nombrepage
     *
     * @return livre
     */
    public function setNombrepage($nombrepage)
    {
        $this->nombrepage = $nombrepage;

        return $this;
    }

    /**
     * Get nombrepage
     *
     * @return integer
     */
    public function getNombrepage()
    {
        return $this->nombrepage;
    }

    /**
     * Set nombreimage
     *
     * @param integer $nombreimage
     *
     * @return livre
     */
    public function setNombreimage($nombreimage)
    {
        $this->nombreimage = $nombreimage;

        return $this;
    }

    /**
     * Get nombreimage
     *
     * @return integer
     */
    public function getNombreimage()
    {
        return $this->nombreimage;
    }

    /**
     * Set dateparution
     *
     * @param \DateTime $dateparution
     *
     * @return livre
     */
    public function setDateparution($dateparution)
    {
        $this->dateparution = $dateparution;

        return $this;
    }

    /**
     * Get dateparution
     *
     * @return \DateTime
     */
    public function getDateparution()
    {
        return $this->dateparution;
    }

    /**
     * Set nombreexemplaire
     *
     * @param integer $nombreexemplaire
     *
     * @return livre
     */
    public function setNombreexemplaire($nombreexemplaire)
    {
        $this->nombreexemplaire = $nombreexemplaire;

        return $this;
    }

    /**
     * Get nombreexemplaire
     *
     * @return integer
     */
    public function getNombreexemplaire()
    {
        return $this->nombreexemplaire;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return livre
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set profilePictureFile
     *
     * @param string $profilePictureFile
     *
     * @return livre
     */
    public function setProfilePictureFile($profilePictureFile)
    {
        $this->ProfilePictureFile = $profilePictureFile;

        return $this;
    }

    /**
     * Get profilePictureFile
     *
     * @return string
     */
    public function getProfilePictureFile()
    {
        return $this->ProfilePictureFile;
    }

    /**
     * Set auteur
     *
     * @param \BibliothequeBundle\Entity\auteur $auteur
     *
     * @return livre
     */
    public function setAuteur(\BibliothequeBundle\Entity\auteur $auteur = null)
    {
        $this->auteur = $auteur;

        return $this;
    }

    /**
     * Get auteur
     *
     * @return \BibliothequeBundle\Entity\auteur
     */
    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * Set dommaine
     *
     * @param \BibliothequeBundle\Entity\dommaine $dommaine
     *
     * @return livre
     */
    public function setDommaine(\BibliothequeBundle\Entity\dommaine $dommaine = null)
    {
        $this->dommaine = $dommaine;

        return $this;
    }

    /**
     * Get dommaine
     *
     * @return \BibliothequeBundle\Entity\dommaine
     */
    public function getDommaine()
    {
        return $this->dommaine;
    }

    /**
     * Add livdom
     *
     * @param \BibliothequeBundle\Entity\emprunt $livdom
     *
     * @return livre
     */
    public function addLivdom(\BibliothequeBundle\Entity\emprunt $livdom)
    {
        $this->livdom[] = $livdom;

        return $this;
    }

    /**
     * Remove livdom
     *
     * @param \BibliothequeBundle\Entity\emprunt $livdom
     */
    public function removeLivdom(\BibliothequeBundle\Entity\emprunt $livdom)
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
