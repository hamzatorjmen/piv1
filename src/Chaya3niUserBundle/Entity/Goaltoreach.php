<?php

namespace Chaya3niUserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Goaltoreach
 *
 * @ORM\Table(name="goaltoreach")
 * @ORM\Entity
 */
class Goaltoreach
{
    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=254, nullable=false)
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(name="taille", type="float", precision=10, scale=0, nullable=false)
     */
    private $taille;

    /**
     * @var string
     *
     * @ORM\Column(name="notes", type="string", length=254, nullable=false)
     */
    private $notes;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=254, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="surname", type="string", length=254, nullable=false)
     */
    private $surname;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=254, nullable=false)
     */
    private $photo;

    /**
     * @var \Chaya3niUserBundle\Entity\Rideanimal
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Chaya3niUserBundle\Entity\Rideanimal")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idAnimal", referencedColumnName="id")
     * })
     */
    private $idanimal;


}

