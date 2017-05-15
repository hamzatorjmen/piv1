<?php

namespace Chaya3niUserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Complaints
 *
 * @ORM\Table(name="complaints", indexes={@ORM\Index(name="iduser", columns={"iduser"})})
 * @ORM\Entity
 */
class Complaints
{
    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text", length=65535, nullable=false)
     */
    private $content;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=254, nullable=false)
     */
    private $type;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateTime", type="datetime", nullable=false)
     */
    private $datetime = 'CURRENT_TIMESTAMP';

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Chaya3niUserBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="Chaya3niUserBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="iduser", referencedColumnName="id")
     * })
     */
    private $iduser;


}

