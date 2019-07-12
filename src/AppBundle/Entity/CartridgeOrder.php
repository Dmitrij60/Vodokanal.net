<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CartridgeOrder
 *
 * @ORM\Table(name="cartridge_order")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CartridgeOrderRepository")
 */
class CartridgeOrder
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
     * @ORM\Column(name="cartridgeModel", type="string", length=255, nullable=true)
     */
    private $cartridgeModel;

    /**
     * @var string
     *
     * @ORM\Column(name="district", type="string", length=255, nullable=true)
     */
    private $district;

    /**
     * @var int
     *
     * @ORM\Column(name="count", type="integer", nullable=true)
     */
    private $count;

    /**
     * @var string
     *
     * @ORM\Column(name="department", type="string", length=255, nullable=true)
     */
    private $department;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime")
     */
    private $created;

    public function __construct()
    {
        $this->created = new \DateTime();
    }

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
     * @return CartridgeOrder
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
     * Set district
     *
     * @param string $district
     *
     * @return CartridgeOrder
     */
    public function setDistrict($district)
    {
        $this->district = $district;

        return $this;
    }

    /**
     * Get district
     *
     * @return string
     */
    public function getDistrict()
    {
        return $this->district;
    }

    /**
     * Set count
     *
     * @param integer $count
     *
     * @return CartridgeOrder
     */
    public function setCount($count)
    {
        $this->count = $count;

        return $this;
    }

    /**
     * Get count
     *
     * @return int
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * Set department
     *
     * @param string $department
     *
     * @return CartridgeOrder
     */
    public function setDepartment($department)
    {
        $this->department = $department;

        return $this;
    }

    /**
     * Get department
     *
     * @return string
     */
    public function getDepartment()
    {
        return $this->department;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return CartridgeOrder
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }
}

