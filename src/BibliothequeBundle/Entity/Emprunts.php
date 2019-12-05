<?php

namespace BibliothequeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Emprunts
 *
 * @ORM\Table(name="emprunts",
 *     uniqueConstraints={
                       @ORM\UniqueConstraint(name="FosUser_Livres_unique", columns={"id", "id_livre"})
              })
 * @ORM\Entity
 */
class Emprunts
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idem", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idem;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_debut", type="date", nullable=false)
     * @Assert\GreaterThanOrEqual("today")
     */
    private $dateDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_fin", type="date", nullable=false)
     *  @Assert\GreaterThan("today")
     */
    private $dateFin;

    /**
     * @ORM\ManyToOne(targetEntity=FosUser::class, inversedBy="emprunts")
     * @ORM\JoinColumn(name="id", referencedColumnName="id")
     * @var FosUser $FosUser
     */
    private $FosUser;

    /**
     * @ORM\ManyToOne(targetEntity=Livres::class,inversedBy="emprunts")
     * @ORM\JoinColumn(name="id_livre", referencedColumnName="id_livre")
     * @var Livres $Livres
     */
    private $Livres;

    /**
     * @return int
     */
    public function getIdem()
    {
        return $this->idem;
    }

    /**
     * @param int $idem
     */
    public function setIdem($idem)
    {
        $this->idem = $idem;
    }

    /**
     * @return \DateTime
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * @param \DateTime $dateDebut
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;
    }

    /**
     * @return \DateTime
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * @param \DateTime $dateFin
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;
    }

    /**
     * @return FosUser
     */
    public function getFosUser()
    {
        return $this->FosUser;
    }

    /**
     * @param FosUser $FosUser
     */
    public function setFosUser($FosUser)
    {
        $this->FosUser = $FosUser;
    }

    /**
     * @return Livres
     */
    public function getLivres()
    {
        return $this->Livres;
    }

    /**
     * @param Livres $Livres
     */
    public function setLivres($Livres)
    {
        $this->Livres = $Livres;
    }


    public function __toString()
    {
        return (string) $this->idem;
    }


}

