<?php
/**
 * Created by PhpStorm.
 * User: I.O.I
 * Date: 2/19/2019
 * Time: 3:48 PM
 */

namespace ArtClassiqueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="Salle_Art")
 */
class SalleArt
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
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;
    /**
     * @var int
     *
     * @ORM\Column(name="nom", type="integer")
     */
    private $capacite;
    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $type;

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
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return int
     */
    public function getCapacite()
    {
        return $this->capacite;
    }

    /**
     * @param int $capacite
     */
    public function setCapacite($capacite)
    {
        $this->capacite = $capacite;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */

}