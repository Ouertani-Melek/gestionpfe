<?php

namespace GestionPfeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cv
 *
 * @ORM\Table(name="cv")
 * @ORM\Entity(repositoryClass="GestionPfeBundle\Repository\CvRepository")
 */
class Cv
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
     * @var string
     *
     * @ORM\Column(name="formation", type="string", length=5000)
     */
    private $formation;

    /**
     * @var string
     *
     * @ORM\Column(name="langues", type="string", length=2000)
     */
    private $langues;

    /**
     * @var string
     *
     * @ORM\Column(name="centresInterets", type="string", length=5000)
     */
    private $centresInterets;

    /**
     * Cv constructor.
     * @param string $formation
     * @param string $langues
     * @param string $centresInterets
     * @param $idUser
     */
    public function __construct($formation, $langues, $centresInterets, $idUser)
    {
        $this->formation = $formation;
        $this->langues = $langues;
        $this->centresInterets = $centresInterets;
        $this->idUser = $idUser;
    }

    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * @param mixed $idUser
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }
    /**
     * @var
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="iduser", referencedColumnName="id")
     */
    private $idUser;



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
     * Set formation
     *
     * @param string $formation
     *
     * @return Cv
     */
    public function setFormation($formation)
    {
        $this->formation = $formation;

        return $this;
    }

    /**
     * Get formation
     *
     * @return string
     */
    public function getFormation()
    {
        return $this->formation;
    }

    /**
     * Set langues
     *
     * @param string $langues
     *
     * @return Cv
     */
    public function setLangues($langues)
    {
        $this->langues = $langues;

        return $this;
    }

    /**
     * Get langues
     *
     * @return string
     */
    public function getLangues()
    {
        return $this->langues;
    }

    /**
     * Set centresInterets
     *
     * @param string $centresInterets
     *
     * @return Cv
     */
    public function setCentresInterets($centresInterets)
    {
        $this->centresInterets = $centresInterets;

        return $this;
    }

    /**
     * Get centresInterets
     *
     * @return string
     */
    public function getCentresInterets()
    {
        return $this->centresInterets;
    }
}

