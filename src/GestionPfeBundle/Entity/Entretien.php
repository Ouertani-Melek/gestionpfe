<?php

namespace GestionPfeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entretien
 *
 * @ORM\Table(name="entretien", uniqueConstraints={@ORM\UniqueConstraint(name="iddemande", columns={"iddemande"})})
 * @ORM\Entity
 */
class Entretien
{
    /**
     * @var integer
     *
     * @ORM\Column(name="identretien", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $identretien;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateentretien", type="datetime", nullable=true)
     */
    private $dateentretien;

    /**
     * @var \Demandes
     *
     * @ORM\ManyToOne(targetEntity="Demandes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="iddemande", referencedColumnName="iddemandes")
     * })
     */
    private $iddemande;


}

