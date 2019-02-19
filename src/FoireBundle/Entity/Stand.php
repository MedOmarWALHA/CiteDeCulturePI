<?php
/**
 * Created by PhpStorm.
 * User: MON ASUS
 * Date: 29/12/2018
 * Time: 15:34
 */

namespace FoireBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Stand
 * @package FoireBundle\Entity
 */


/**
 * @ORM\Entity
 *
 */

class Stand
{
    /**
     * @ORM\GeneratedValue
     * @ORM\Id
     * @ORM\Column(type="integer")
     */

    private $numerostand;

    /**
     * @ORM\Column(type="string")
     */

    private $EtatdeReponse;

    /**
     * @return mixed
     */
    public function getEtatdeReponse()
    {
        return $this->EtatdeReponse;
    }

    /**
     * @param mixed $EtatdeReponse
     */
    public function setEtatdeReponse($EtatdeReponse)
    {
        $this->EtatdeReponse = $EtatdeReponse;
    }



    /**
     * @ORM\ManyToOne(targetEntity="Foire")
     * @ORM\JoinColumn(name="foire_id" ,referencedColumnName="identifiant")
     */

    private $id;



    /**
     * @return mixed
     */
    public function getNumerostand()
    {
        return $this->numerostand;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }



    /**
     * @param mixed $numerostand
     */
    public function setNumerostand($numerostand)
    {
        $this->numerostand = $numerostand;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }









}
