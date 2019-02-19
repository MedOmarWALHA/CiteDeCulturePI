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
     * @ORM\GeneratedValue
     * @ORM\Id
     * @ORM\Column(type="integer")
     */

    private $identifiant;

    /**
     *
     * @ORM\Column(type="string",length=255)
     */

    private $NomFoire;

    /**
     *
     * @ORM\Column(type="date")
     */
    private $DateDebut;


    /**
     *
     * @ORM\Column(type="date")
     */
    private $DateFin;


    /**
     *
     * @ORM\Column(type="integer")
     */
    private $NombreDeStand;


    /**
     *
     * @ORM\Column(type="integer")
     */
    private $PrixDuStand;

    /**
     * @return mixed
     */
    public function getIdentifiant()
    {
        return $this->identifiant;
    }

    /**
     * @return mixed
     */
    public function getNomFoire()
    {
        return $this->NomFoire;
    }

    /**
     * @return mixed
     */
    public function getDateDebut()
    {
        return $this->DateDebut;
    }

    /**
     * @return mixed
     */
    public function getDateFin()
    {
        return $this->DateFin;
    }

    /**
     * @return mixed
     */
    public function getNombreDeStand()
    {
        return $this->NombreDeStand;
    }

    /**
     * @return mixed
     */
    public function getPrixDuStand()
    {
        return $this->PrixDuStand;
    }

    /**
     * @param mixed $identifiant
     */
    public function setIdentifiant($identifiant)
    {
        $this->identifiant = $identifiant;
    }

    /**
     * @param mixed $NomFoire
     */
    public function setNomFoire($NomFoire)
    {
        $this->NomFoire = $NomFoire;
    }

    /**
     * @param mixed $DateDebut
     */
    public function setDateDebut($DateDebut)
    {
        $this->DateDebut = $DateDebut;
    }

    /**
     * @param mixed $DateFin
     */
    public function setDateFin($DateFin)
    {
        $this->DateFin = $DateFin;
    }

    /**
     * @param mixed $NombreDeStand
     */
    public function setNombreDeStand($NombreDeStand)
    {
        $this->NombreDeStand = $NombreDeStand;
    }

    /**
     * @param mixed $PrixDuStand
     */
    public function setPrixDuStand($PrixDuStand)
    {
        $this->PrixDuStand = $PrixDuStand;
    }




}
