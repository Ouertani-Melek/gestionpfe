<?php

namespace GestionPfeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CompetencesTechniques
 *
 * @ORM\Table(name="competences_techniques")
 * @ORM\Entity(repositoryClass="GestionPfeBundle\Repository\CompetencesTechniquesRepository")
 */
class CompetencesTechniques
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
     * CompetencesTechniques constructor.
     * @param $idCv
     * @param string $competence
     */
    public function __construct($idCv, $competence)
    {
        $this->idCv = $idCv;
        $this->competence = $competence;
    }

    /**
     * @return mixed
     */
    public function getIdCv()
    {
        return $this->idCv;
    }

    /**
     * @param mixed $idCv
     */
    public function setIdCv($idCv)
    {
        $this->idCv = $idCv;
    }

    /**
     * @var
     *
     * @ORM\ManyToOne(targetEntity="Cv")
     * @ORM\JoinColumn(name="idcv", referencedColumnName="id")
     */
    private $idCv;



    /**
     * @var string
     *
     * @ORM\Column(name="competence", type="string", length=2000)
     */
    private $competence;


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
     * Set competence
     *
     * @param string $competence
     *
     * @return CompetencesTechniques
     */
    public function setCompetence($competence)
    {
        $this->competence = $competence;

        return $this;
    }

    /**
     * Get competence
     *
     * @return string
     */
    public function getCompetence()
    {
        return $this->competence;
    }
}

