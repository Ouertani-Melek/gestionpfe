<?php

namespace GestionPfeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Technologies
 *
 * @ORM\Table(name="technologies", indexes={@ORM\Index(name="idoffre", columns={"idoffre"})})
 * @ORM\Entity
 */
class Technologies
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idtech", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtech;

    /**
     * @var integer
     *
     * @ORM\Column(name="idoffre", type="integer", nullable=false)
     */
    private $idoffre;

    /**
     * @var string
     *
     * @ORM\Column(name="technologie", type="string", length=255, nullable=true)
     */
    private $technologie;


}

