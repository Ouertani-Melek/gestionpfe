<?php

namespace GestionPfeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Demandes
 *
 * @ORM\Table(name="demandes", indexes={@ORM\Index(name="iduser", columns={"iduser"}), @ORM\Index(name="idoffre", columns={"idoffre"})})
 * @ORM\Entity
 */
class Demandes
{
    /**
     * @var integer
     *
     * @ORM\Column(name="iddemandes", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $iddemandes;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=255, nullable=true)
     */
    private $etat;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date = 'CURRENT_TIMESTAMP';

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="iduser", referencedColumnName="id")
     * })
     */
    private $iduser;

    /**
     * @var \Offres
     *
     * @ORM\ManyToOne(targetEntity="Offres")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idoffre", referencedColumnName="idoffre")
     * })
     */
    private $idoffre;


}

