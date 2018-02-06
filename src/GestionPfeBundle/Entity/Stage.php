<?php

namespace GestionPfeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Stage
 *
 * @ORM\Table(name="stage", indexes={@ORM\Index(name="identreprise", columns={"identreprise"}), @ORM\Index(name="idetudiant", columns={"idetudiant"}), @ORM\Index(name="idencadrant", columns={"idencadrant"})})
 * @ORM\Entity
 */
class Stage
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idstage", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idstage;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=1000, nullable=false)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="descreptif", type="string", length=50000, nullable=true)
     */
    private $descreptif;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datedebut", type="date", nullable=true)
     */
    private $datedebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datefin", type="date", nullable=true)
     */
    private $datefin;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="identreprise", referencedColumnName="id")
     * })
     */
    private $identreprise;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idetudiant", referencedColumnName="id")
     * })
     */
    private $idetudiant;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idencadrant", referencedColumnName="id")
     * })
     */
    private $idencadrant;


}

