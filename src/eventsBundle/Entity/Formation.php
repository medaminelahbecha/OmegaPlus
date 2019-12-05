<?php

namespace eventsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Formation
 *
 * @ORM\Table(name="formation")
 * @ORM\Entity
 */
class Formation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_formation", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idFormation;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_formation", type="string", length=255, nullable=false)
     */
    private $nomFormation;

    /**
     * @var string
     *
     * @ORM\Column(name="sujet_formation", type="string", length=255, nullable=false)
     */
    private $sujetFormation;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_formateur", type="string", length=255, nullable=false)
     */
    private $nomFormateur;

    /**
     * @var integer
     *
     * @ORM\Column(name="nombre_place_formation", type="integer", nullable=false)
     */
    private $nombrePlaceFormation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_formation", type="datetime", nullable=false)
     */
    private $dateFormation;

    /**
     * @var string
     *
     * @ORM\Column(name="localisation", type="string", length=255, nullable=false)
     */
    private $localisation;


}

