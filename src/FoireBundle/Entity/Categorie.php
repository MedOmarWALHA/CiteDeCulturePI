<?php
/**
 * Created by PhpStorm.
 * User: MON ASUS
 * Date: 25/02/2019
 * Time: 00:12
 */

namespace FoireBundle\Entity;


class Categorie
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
     * @ORM\Column(name="nom_categorie", type="string", length=255)
     */

    private $Nom;




    /**
     * @var int
     * @ORM\Column(name="type", type="string")
     */
    private $Type;

    /**
     * @return int
     */
    public function getIdentifiant()
    {
        return $this->identifiant;
    }

    /**
     * @return string
     */
    public function getNom()
    {
        return $this->Nom;
    }

    /**
     * @return int
     */
    public function getType()
    {
        return $this->Type;
    }

    /**
     * @param int $identifiant
     */
    public function setIdentifiant($identifiant)
    {
        $this->identifiant = $identifiant;
    }

    /**
     * @param string $Nom
     */
    public function setNom($Nom)
    {
        $this->Nom = $Nom;
    }

    /**
     * @param int $Type
     */
    public function setType($Type)
    {
        $this->Type = $Type;
    }








}