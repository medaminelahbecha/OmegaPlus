<?php

namespace eventsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Userevent
 *
 * @ORM\Table(name="userevent", indexes={@ORM\Index(name="idUser", columns={"idUser"}), @ORM\Index(name="idEvent", columns={"idEvent"}), @ORM\Index(name="idUser_2", columns={"idUser"})})
 * @ORM\Entity
 */
class Userevent
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idUser", type="integer", nullable=false)
     */
    private $iduser;

    /**
     * @var integer
     *
     * @ORM\Column(name="idEvent", type="integer", nullable=false)
     */
    private $idevent;

    /**
     * @var integer
     *
     * @ORM\Column(name="idUE", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idue;


}

