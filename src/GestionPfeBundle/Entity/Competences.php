<?php

namespace GestionPfeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Competences
 *
 * @ORM\Table(name="competences", indexes={@ORM\Index(name="idcv", columns={"idcv"})})
 * @ORM\Entity
 */
class Competences
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idcomp", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcomp;

    /**
     * @var string
     *
     * @ORM\Column(name="competence", type="string", length=2000, nullable=true)
     */
    private $competence;

    /**
     * @var \Cv
     *
     * @ORM\ManyToOne(targetEntity="Cv")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idcv", referencedColumnName="idcv")
     * })
     */
    private $idcv;


}

