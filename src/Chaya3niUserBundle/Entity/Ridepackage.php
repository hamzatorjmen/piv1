<?php

namespace Chaya3niUserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ridepackage
 *
 * @ORM\Table(name="ridepackage", indexes={@ORM\Index(name="id", columns={"idtrajet"}), @ORM\Index(name="id_2", columns={"idtrajet"})})
 * @ORM\Entity
 */
class Ridepackage
{
    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="size", type="string", length=20, nullable=false)
     */
    private $size;

    /**
     * @var string
     *
     * @ORM\Column(name="typePackage", type="string", length=20, nullable=false)
     */
    private $typepackage;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantity", type="integer", nullable=false)
     */
    private $quantity;

    /**
     * @var float
     *
     * @ORM\Column(name="poids", type="float", precision=10, scale=0, nullable=false)
     */
    private $poids;

    /**
     * @var integer
     *
     * @ORM\Column(name="prix", type="integer", nullable=false)
     */
    private $prix;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_package", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPackage;

    /**
     * @var \Chaya3niUserBundle\Entity\Ridepassenger
     *
     * @ORM\ManyToOne(targetEntity="Chaya3niUserBundle\Entity\Ridepassenger", cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idtrajet", referencedColumnName="id")
     * })
     */
    private $idtrajet;

    /**
     * @var \Chaya3niUserBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="Chaya3niUserBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idUser", referencedColumnName="id")
     * })
     */
    private $iduser;



    /**
     * Set description
     *
     * @param string $description
     *
     * @return Ridepackage
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set size
     *
     * @param string $size
     *
     * @return Ridepackage
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get size
     *
     * @return string
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set typepackage
     *
     * @param string $typepackage
     *
     * @return Ridepackage
     */
    public function setTypepackage($typepackage)
    {
        $this->typepackage = $typepackage;

        return $this;
    }

    /**
     * Get typepackage
     *
     * @return string
     */
    public function getTypepackage()
    {
        return $this->typepackage;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     *
     * @return Ridepackage
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set poids
     *
     * @param float $poids
     *
     * @return Ridepackage
     */
    public function setPoids($poids)
    {
        $this->poids = $poids;

        return $this;
    }

    /**
     * Get poids
     *
     * @return float
     */
    public function getPoids()
    {
        return $this->poids;
    }

    /**
     * Set prix
     *
     * @param integer $prix
     *
     * @return Ridepackage
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return integer
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Get idPackage
     *
     * @return integer
     */
    public function getIdPackage()
    {
        return $this->idPackage;
    }

    /**
     * Set idtrajet
     *
     * @param \Chaya3niUserBundle\Entity\Ridepassenger $idtrajet
     *
     * @return Ridepackage
     */
    public function setIdtrajet(\Chaya3niUserBundle\Entity\Ridepassenger $idtrajet = null)
    {
        $this->idtrajet = $idtrajet;

        return $this;
    }

    /**
     * Get idtrajet
     *
     * @return \Chaya3niUserBundle\Entity\Ridepassenger
     */
    public function getIdtrajet()
    {
        return $this->idtrajet;
    }

    /**
     * Set iduser
     *
     * @param \Chaya3niUserBundle\Entity\User $iduser
     *
     * @return Ridepackage
     */
    public function setIduser(\Chaya3niUserBundle\Entity\User $iduser = null)
    {
        $this->iduser = $iduser;

        return $this;
    }

    /**
     * Get iduser
     *
     * @return \Chaya3niUserBundle\Entity\User
     */
    public function getIduser()
    {
        return $this->iduser;
    }
}
