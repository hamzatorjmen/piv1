<?php

namespace Chaya3niUserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rideanimal
 *
 * @ORM\Table(name="rideanimal")
 * @ORM\Entity
 */
class Rideanimal
{
    /**
     * @var string
     *
     * @ORM\Column(name="nameAnimal", type="string", length=254, nullable=false)
     */
    private $nameanimal;

    /**
     * @var string
     *
     * @ORM\Column(name="speciesAnimal", type="string", length=254, nullable=false)
     */
    private $speciesanimal;

    /**
     * @var boolean
     *
     * @ORM\Column(name="haveLuggage", type="boolean", nullable=false)
     */
    private $haveluggage;

    /**
     * @var float
     *
     * @ORM\Column(name="luggageMass", type="float", precision=10, scale=0, nullable=false)
     */
    private $luggagemass = '0';

    /**
     * @var float
     *
     * @ORM\Column(name="animalMass", type="float", precision=10, scale=0, nullable=false)
     */
    private $animalmass = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="specialNeeds", type="string", length=254, nullable=false)
     */
    private $specialneeds;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=254, nullable=false)
     */
    private $photo;

    /**
     * @var \Chaya3niUserBundle\Entity\Ridepassenger
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Chaya3niUserBundle\Entity\Ridepassenger")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id", referencedColumnName="id")
     * })
     */
    private $id;


}

