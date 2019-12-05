<?php

namespace eventsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Club
 *
 * @ORM\Table(name="club")
 * @ORM\Entity
 */
class Club
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_club", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idClub;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_club", type="string", length=255, nullable=false)
     */
    private $nomClub;

    /**
     * @var string
     *
     * @ORM\Column(name="domaine_club", type="string", length=255, nullable=false)
     */
    private $domaineClub;

    /**
     * @var integer
     *
     * @ORM\Column(name="placeDesponible_club", type="integer", nullable=false)
     */
    private $placedesponibleClub;


}

