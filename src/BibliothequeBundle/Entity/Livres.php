<?php

namespace BibliothequeBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
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
    private $Livres;

    /**
     * @return int
     */
    public function getIdLivre()
    {
        return $this->idLivre;
    }

    /**
     * @param int $idLivre
     */
    public function setIdLivre($idLivre)
    {
        $this->idLivre = $idLivre;
    }

    /**
     * @return string
     */
    public function getNomLivre()
    {
        return $this->nomLivre;
    }

    /**
     * @param string $nomLivre
     */
    public function setNomLivre($nomLivre)
    {
        $this->nomLivre = $nomLivre;
    }

    /**
     * @return string
     */
    public function getAuteurLivre()
    {
        return $this->auteurLivre;
    }

    /**
     * @param string $auteurLivre
     */
    public function setAuteurLivre($auteurLivre)
    {
        $this->auteurLivre = $auteurLivre;
    }

    /**
     * @return string
     */
    public function getEtatLivre()
    {
        return $this->etatLivre;
    }

    /**
     * @param string $etatLivre
     */
    public function setEtatLivre($etatLivre)
    {
        $this->etatLivre = $etatLivre;
    }

    /**
     * @return string
     */
    public function getDomaineLivre()
    {
        return $this->domaineLivre;
    }

    /**
     * @param string $domaineLivre
     */
    public function setDomaineLivre($domaineLivre)
    {
        $this->domaineLivre = $domaineLivre;
    }

    /**
     * @return int
     */
    public function getNombreexemplaire()
    {
        return $this->nombreexemplaire;
    }

    /**
     * @param int $nombreexemplaire
     */
    public function setNombreexemplaire($nombreexemplaire)
    {
        $this->nombreexemplaire = $nombreexemplaire;
    }

    /**
     * @return ArrayCollection
     */
    public function getEmprunts()
    {
        return $this->emprunts;
    }

    /**
     * @param ArrayCollection $emprunts
     */
    public function setEmprunts($emprunts)
    {
        $this->emprunts = $emprunts;
    }

    /**
     * @ORM\OneToMany(targetEntity=Emprunts::class, mappedBy="Livres")
     */
    private $emprunts;

    public function __construct()
    {
        $this->emprunts = new ArrayCollection();
    }

    public function __toString()
    {
        return (string) $this->nomLivre;
    }
}

