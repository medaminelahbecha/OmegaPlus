<?php

namespace eventsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * category
 *
 * @ORM\Table(name="Category")
 * @ORM\Entity(repositoryClass="eventsBundle\Repository\categoryRepository")
 */
class category
{
    /**
     * @ORM\OneToMany(targetEntity="Events", mappedBy="category")
     */
    private $Events;

    public function __construct()
    {
        $this->Events = new ArrayCollection();
    }

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;
function __toString()
{
    // TODO: Implement __toString() method.
    return (string) $this->getLibelle();
}

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     *
     * @return category
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }
}

