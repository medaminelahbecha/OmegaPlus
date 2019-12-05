<?php

namespace eventsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Livres
 *
 * @ORM\Table(name="livres", indexes={@ORM\Index(name="id_livre", columns={"id_livre"})})
 * @ORM\Entity
 */
class Livres
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_livre", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idLivre;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_livre", type="string", length=255, nullable=false)
     */
    private $nomLivre;

    /**
     * @var string
     *
     * @ORM\Column(name="auteur_livre", type="string", length=255, nullable=false)
     */
    private $auteurLivre;

    /**
     * @var string
     *
     * @ORM\Column(name="etat_livre", type="string", length=255, nullable=false)
     */
    private $etatLivre;

    /**
     * @var string
     *
     * @ORM\Column(name="domaine_livre", type="string", length=255, nullable=false)
     */
    private $domaineLivre;

    /**
     * @var integer
     *
     * @ORM\Column(name="nombreExemplaire", type="integer", nullable=false)
     */
    private $nombreexemplaire;


}

