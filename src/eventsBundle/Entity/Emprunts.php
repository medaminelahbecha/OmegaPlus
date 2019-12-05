<?php

namespace eventsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Emprunts
 *
 * @ORM\Table(name="emprunts", indexes={@ORM\Index(name="id_livre", columns={"id_livre"}), @ORM\Index(name="idUser", columns={"idUser"})})
 * @ORM\Entity
 */
class Emprunts
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_emprunt", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEmprunt;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_livre", type="integer", nullable=false)
     */
    private $idLivre;

    /**
     * @var integer
     *
     * @ORM\Column(name="idUser", type="integer", nullable=false)
     */
    private $iduser;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_debut", type="date", nullable=false)
     */
    private $dateDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_fin", type="date", nullable=false)
     */
    private $dateFin;


}

