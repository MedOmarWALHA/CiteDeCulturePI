<?php
/**
 * Created by PhpStorm.
 * User: MON ASUS
 * Date: 28/12/2018
 * Time: 17:38
 */

namespace FoireBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Foire
 * @package FoireBundle\Entity
 */

/**
 * @ORM\Entity
 *
 */

class Foire
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */

    private $identifiant;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_foire", type="string", length=255)
     */

    private $NomFoire;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_debut", type="datetime", nullable=false)
     */
    private $DateDebut;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_fin", type="datetime", nullable=false)
     */
    private $DateFin;


    /**
     * @var int
     * @ORM\Column(name="nombre_de_stand", type="integer")
     */
    private $NombreDeStand;




    /**
     * @var int
     * @ORM\Column(name="prix_du_stand", type="integer")
     */
    private $PrixDuStand;

    /**
     * @return int
     */
    public function getIdentifiant()
    {
        return $this->identifiant;
    }

    /**
     * @param int $identifiant
     */
    public function setIdentifiant($identifiant)
    {
        $this->identifiant = $identifiant;
    }

    /**
     * @return string
     */
    public function getNomFoire()
    {
        return $this->NomFoire;
    }

    /**
     * @param string $NomFoire
     */
    public function setNomFoire($NomFoire)
    {
        $this->NomFoire = $NomFoire;
    }

    /**
     * @return \DateTime
     */
    public function getDateDebut()
    {
        return $this->DateDebut;
    }

    /**
     * @param \DateTime $DateDebut
     */
    public function setDateDebut($DateDebut)
    {
        $this->DateDebut = $DateDebut;
    }

    /**
     * @return \DateTime
     */
    public function getDateFin()
    {
        return $this->DateFin;
    }

    /**
     * @param \DateTime $DateFin
     */
    public function setDateFin($DateFin)
    {
        $this->DateFin = $DateFin;
    }

    /**
     * @return int
     */
    public function getNombreDeStand()
    {
        return $this->NombreDeStand;
    }

    /**
     * @param int $NombreDeStand
     */
    public function setNombreDeStand($NombreDeStand)
    {
        $this->NombreDeStand = $NombreDeStand;
    }

    /**
     * @return int
     */
    public function getPrixDuStand()
    {
        return $this->PrixDuStand;
    }

    /**
     * @param int $PrixDuStand
     */
    public function setPrixDuStand($PrixDuStand)
    {
        $this->PrixDuStand = $PrixDuStand;
    }


}
