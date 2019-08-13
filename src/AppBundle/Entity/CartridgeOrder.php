<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use APY\DataGridBundle\Grid\Mapping as GRID;

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
     *@GRID\Column(title="модель картриджа", searchOnClick="true")
     * @ORM\Column(name="cartridgeModel", type="string", length=255, nullable=true)
     */
    private $cartridgeModel;

    /**
     * @var string
     *@GRID\Column(title="район", searchOnClick="true")
     * @ORM\Column(name="district", type="string", length=255, nullable=true)
     */
    private $district;

    /**
     * @var int
     *@GRID\Column(title="кол-во")
     * @ORM\Column(name="count", type="integer", nullable=true)
     */
    private $count;

    /**
     * @var string
     *@GRID\Column(title="отдел", searchOnClick="true")
     * @ORM\Column(name="department", type="string", length=255, nullable=true)
     */
    private $department;

    /**
     * @var \DateTime
     *@GRID\Column(title="подана", format="d.m.y H:i:s")
     * @ORM\Column(name="created", type="datetime")
     */
    private $created;

    public function __construct()
    {
        $this->created = new \DateTime();
        $this->issued = 0;
        $this->status = 'Заявка подана';
    }

    /**
     * @var integer
     *@GRID\Column(title="выдано, шт")
     * @ORM\Column(name="issued", type="integer", length=255, nullable=true)
     */
    private $issued;


    /**
     * @var string
     * @GRID\Column(title="кто забрал")
     * @ORM\Column(name="who", type="string", length=255, nullable=true)
     */
    private $who;

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

    /**
     * Set issued
     *
     * @param integer $issued
     *
     * @return CartridgeOrder
     */
    public function setIssued($issued)
    {
        $this->issued = $issued;

        return $this;
    }

    /**
     * Get issued
     *
     * @return integer
     */
    public function getIssued()
    {
        return $this->issued;
    }



    /**
     * Get who
     *
     * @return string
     */
    public function getWho()
    {
        return $this->who;
    }

    /**
     * Set who
     *
     * @param string $who
     *
     * @return CartridgeOrder
     */
    public function setWho($who)
    {
        $this->who = $who;

        return $this;
    }
}

