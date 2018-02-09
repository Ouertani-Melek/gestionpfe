<?php

namespace GestionPfeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Encadrement
 *
 * @ORM\Table(name="encadrement")
 * @ORM\Entity(repositoryClass="GestionPfeBundle\Repository\EncadrementRepository")
 */
class Encadrement
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @var
     *
     * @ORM\ManyToOne(targetEntity="Stage")
     * @ORM\JoinColumn(name="idstage", referencedColumnName="id")
     */
    private $idStage;

    /**
     * @var bool
     *
     * @ORM\Column(name="Etat", type="boolean")
     */
    private $etat;

    /**
     * @var float
     *
     * @ORM\Column(name="pourcentage", type="float")
     */
    private $pourcentage;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateReunion", type="datetime")
     */
    private $dateReunion;

    /**
     * Encadrement constructor.
     * @param $idStage
     * @param bool $etat
     * @param float $pourcentage
     * @param \DateTime $dateReunion
     */
    public function __construct($idStage, $etat, $pourcentage, \DateTime $dateReunion)
    {
        $this->idStage = $idStage;
        $this->etat = $etat;
        $this->pourcentage = $pourcentage;
        $this->dateReunion = $dateReunion;
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
     * Set etat
     *
     * @param boolean $etat
     *
     * @return Encadrement
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return bool
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * @return mixed
     */
    public function getIdStage()
    {
        return $this->idStage;
    }

    /**
     * @param mixed $idStage
     */
    public function setIdStage($idStage)
    {
        $this->idStage = $idStage;
    }

    /**
     * Set pourcentage
     *
     * @param float $pourcentage
     *
     * @return Encadrement
     */
    public function setPourcentage($pourcentage)
    {
        $this->pourcentage = $pourcentage;

        return $this;
    }

    /**
     * Get pourcentage
     *
     * @return float
     */
    public function getPourcentage()
    {
        return $this->pourcentage;
    }

    /**
     * Set dateReunion
     *
     * @param \DateTime $dateReunion
     *
     * @return Encadrement
     */
    public function setDateReunion($dateReunion)
    {
        $this->dateReunion = $dateReunion;

        return $this;
    }

    /**
     * Get dateReunion
     *
     * @return \DateTime
     */
    public function getDateReunion()
    {
        return $this->dateReunion;
    }
}

