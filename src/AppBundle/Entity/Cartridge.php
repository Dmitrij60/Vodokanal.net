<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cartridge
 *
 * @ORM\Table(name="cartridge")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CartridgeRepository")
 */
class Cartridge
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="cartridgeModel", type="string", length=255)
     */
    private $cartridgeModel;

    /**
     * @var string
     *
     * @ORM\Column(name="printModel", type="string", length=255, nullable=true)
     */
    private $printModel;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set cartridgeModel
     *
     * @param string $cartridgeModel
     *
     * @return Cartridge
     */
    public function setCartridgeModel($cartridgeModel)
    {
        $this->cartridgeModel = $cartridgeModel;

        return $this;
    }

    /**
     * Get cartridgeModel
     *
     * @return string
     */
    public function getCartridgeModel()
    {
        return $this->cartridgeModel;
    }

    /**
     * Set printModel
     *
     * @param string $printModel
     *
     * @return Cartridge
     */
    public function setPrintModel($printModel)
    {
        $this->printModel = $printModel;

        return $this;
    }

    /**
     * Get printModel
     *
     * @return string
     */
    public function getPrintModel()
    {
        return $this->printModel;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Cartridge
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
}

