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
     * @ORM\Column(name="discription", type="string", length=255, nullable=true)
     */
    private $discription;

    /**
     * @var int
     *
     * @ORM\Column(name="exist", type="integer", length=255, nullable=true)
     */
    private $exist;

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
     * Set discription
     *
     * @param string $discription
     *
     * @return Cartridge
     */
    public function setDiscription($discription)
    {
        $this->discription = $discription;
        return $this;
    }
    /**
     * Get discription
     *
     * @return string
     */
    public function getDiscription()
    {
        return $this->discription;
    }

    /**
     * Set exist
     *
     * @param int $exist
     *
     * @return Cartridge
     */
    public function setExist($exist)
    {
        $this->exist = $exist;
        return $this;
    }
    /**
     * Get exist
     *
     * @return int
     */
    public function getExist()
    {
        return $this->exist;
    }
}
