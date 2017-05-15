<?php

namespace Chaya3niUserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bookings
 *
 * @ORM\Table(name="bookings", indexes={@ORM\Index(name="idRidePassenger", columns={"idRidePassenger"}), @ORM\Index(name="idRideDriver", columns={"idRideDriver"})})
 * @ORM\Entity
 */
class Bookings
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idRidePassenger", type="integer", nullable=false)
     */
    private $idridepassenger;

    /**
     * @var integer
     *
     * @ORM\Column(name="idRideDriver", type="integer", nullable=false)
     */
    private $idridedriver;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;


}

