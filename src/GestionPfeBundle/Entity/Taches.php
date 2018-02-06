<?php

namespace GestionPfeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Taches
 *
 * @ORM\Table(name="taches", indexes={@ORM\Index(name="idencadrement", columns={"idencadrement"})})
 * @ORM\Entity
 */
class Taches
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idtache", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtache;

    /**
     * @var string
     *
     * @ORM\Column(name="tache", type="string", length=5000, nullable=true)
     */
    private $tache;

    /**
     * @var boolean
     *
     * @ORM\Column(name="etat", type="boolean", nullable=true)
     */
    private $etat;

    /**
     * @var \Encadrement
     *
     * @ORM\ManyToOne(targetEntity="Encadrement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idencadrement", referencedColumnName="idencadrement")
     * })
     */
    private $idencadrement;


}

