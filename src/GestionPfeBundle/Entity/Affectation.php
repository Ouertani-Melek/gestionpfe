<?php

namespace GestionPfeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Affectation
 *
 * @ORM\Table(name="affectation", indexes={@ORM\Index(name="idsoutenance", columns={"idsoutenance"}), @ORM\Index(name="idenseignant", columns={"idenseignant"})})
 * @ORM\Entity
 */
class Affectation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idaffectation", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idaffectation;

    /**
     * @var \Soutenance
     *
     * @ORM\ManyToOne(targetEntity="Soutenance")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idsoutenance", referencedColumnName="idsoutenance")
     * })
     */
    private $idsoutenance;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idenseignant", referencedColumnName="id")
     * })
     */
    private $idenseignant;


}

