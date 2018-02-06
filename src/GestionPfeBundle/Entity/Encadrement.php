<?php

namespace GestionPfeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Encadrement
 *
 * @ORM\Table(name="encadrement", indexes={@ORM\Index(name="idstage", columns={"idstage"})})
 * @ORM\Entity
 */
class Encadrement
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idencadrement", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idencadrement;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=100, nullable=true)
     */
    private $etat;

    /**
     * @var float
     *
     * @ORM\Column(name="pourcentage", type="float", precision=10, scale=0, nullable=true)
     */
    private $pourcentage;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datereunion", type="datetime", nullable=true)
     */
    private $datereunion;

    /**
     * @var \Stage
     *
     * @ORM\ManyToOne(targetEntity="Stage")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idstage", referencedColumnName="idstage")
     * })
     */
    private $idstage;


}

