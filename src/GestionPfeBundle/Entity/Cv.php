<?php

namespace GestionPfeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cv
 *
 * @ORM\Table(name="cv", indexes={@ORM\Index(name="iduser", columns={"iduser"})})
 * @ORM\Entity
 */
class Cv
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idcv", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcv;

    /**
     * @var string
     *
     * @ORM\Column(name="formation", type="string", length=2000, nullable=true)
     */
    private $formation;

    /**
     * @var string
     *
     * @ORM\Column(name="langues", type="string", length=1000, nullable=true)
     */
    private $langues;

    /**
     * @var string
     *
     * @ORM\Column(name="centresinteret", type="string", length=2000, nullable=true)
     */
    private $centresinteret;

    /**
     * @var string
     *
     * @ORM\Column(name="experience", type="string", length=2000, nullable=true)
     */
    private $experience;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="iduser", referencedColumnName="id")
     * })
     */
    private $iduser;


}

