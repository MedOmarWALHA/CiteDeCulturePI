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
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $numerostand;

    /**
     * @var string
     *
     * @ORM\Column(name="etatde_reponse", type="string", length=255)
     */
    private $EtatdeReponse;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     *
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="FoireBundle\Entity\Foire")
     * @ORM\JoinColumn(name="foire_id", referencedColumnName="id")
     *
     */
    private $foire;

    /**
     * @return int
     */
    public function getNumerostand()
    {
        return $this->numerostand;
    }

    /**
     * @param int $numerostand
     */
    public function setNumerostand($numerostand)
    {
        $this->numerostand = $numerostand;
    }

    /**
     * @return string
     */
    public function getEtatdeReponse()
    {
        return $this->EtatdeReponse;
    }

    /**
     * @param string $EtatdeReponse
     */
    public function setEtatdeReponse($EtatdeReponse)
    {
        $this->EtatdeReponse = $EtatdeReponse;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getFoire()
    {
        return $this->foire;
    }

    /**
     * @param mixed $foire
     */
    public function setFoire($foire)
    {
        $this->foire = $foire;
    }


}
