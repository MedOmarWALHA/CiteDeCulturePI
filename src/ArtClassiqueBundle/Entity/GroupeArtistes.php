<?php
/**
 * Created by PhpStorm.
 * User: I.O.I
 * Date: 2/21/2019
 * Time: 7:21 PM
 */

namespace ArtClassiqueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Groupe_Artistes")
 */
class GroupeArtistes
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
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;
    /**
     * @ORM\OneToOne(targetEntity="ArtClassiqueBundle\Entity\Artiste")
     * @ORM\JoinColumn(name="id_chef_groupe", referencedColumnName="id")
     *
     */
    private $chefGroupe;

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
     * @return mixed
     */
    public function getChefGroupe()
    {
        return $this->chefGroupe;
    }

    /**
     * @param mixed $chefGroupe
     */
    public function setChefGroupe($chefGroupe)
    {
        $this->chefGroupe = $chefGroupe;
    }


    public function __toString(){
        // to show the name of the Category in the select
        return $this->nom;
        // to show the id of the Category in the select
        // return $this->id;
    }
}