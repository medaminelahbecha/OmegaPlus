<?php

namespace BibliothequeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Auteur
 *
 * @ORM\Table(name="auteur", indexes={@ORM\Index(name="livres", columns={"livres"}), @ORM\Index(name="nom_auteur", columns={"nom_auteur"}), @ORM\Index(name="id_livre", columns={"idlivre"})})
 * @ORM\Entity
 */
class Auteur
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_auteur", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAuteur;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_auteur", type="string", length=255, nullable=false)
     */
    private $nomAuteur;

    /**
     * @var string
     *
     * @ORM\Column(name="livres", type="string", length=255, nullable=false)
     */
    private $livres;

    /**
     * @var integer
     *
     * @ORM\Column(name="idlivre", type="integer", nullable=false)
     */
    private $idlivre;


}

