<?php
/**
 * Created by PhpStorm.
 * User: I.O.I
 * Date: 2/21/2019
 * Time: 6:40 PM
 */

namespace ArtClassiqueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Reservation_Salle")
 */
class ReservationSalle
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
     * @ORM\Column(name="type_spectacle", type="string", length=255)
     */
    private $typeSpectacle;
    /**
     * @ORM\ManyToOne(targetEntity="ArtClassiqueBundle\Entity\SalleArt")
     * @ORM\JoinColumn(name="id_salle", referencedColumnName="id")
     *
     */
    private $SalleArt;
    /**
     * @ORM\ManyToOne(targetEntity="ArtClassiqueBundle\Entity\GroupeArtistes")
     * @ORM\JoinColumn(name="id_groupe", referencedColumnName="id")
     *
     */
    private $groupe;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getTypeSpectacle()
    {
        return $this->typeSpectacle;
    }

    /**
     * @param string $typeSpectacle
     */
    public function setTypeSpectacle($typeSpectacle)
    {
        $this->typeSpectacle = $typeSpectacle;
    }

    /**
     * @return mixed
     */
    public function getSalleArt()
    {
        return $this->SalleArt;
    }

    /**
     * @param mixed $SalleArt
     */
    public function setSalleArt($SalleArt)
    {
        $this->SalleArt = $SalleArt;
    }

    /**
     * @return mixed
     */
    public function getGroupe()
    {
        return $this->groupe;
    }

    /**
     * @param mixed $groupe
     */
    public function setGroupe($groupe)
    {
        $this->groupe = $groupe;
    }

}