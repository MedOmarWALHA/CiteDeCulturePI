<?php
/**
 * Created by PhpStorm.
 * User: I.O.I
 * Date: 2/19/2019
 * Time: 3:48 PM
 */

namespace ArtClassiqueBundle\Entity;


class Artiste
{
    /**
     * @var string
     * @ORM\Id
     * @ORM\Column(name="matricule", type="string", length=255)
     */
    private $matricule;
    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;
    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;



}