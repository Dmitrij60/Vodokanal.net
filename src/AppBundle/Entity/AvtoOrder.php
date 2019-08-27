<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use APY\DataGridBundle\Grid\Mapping as GRID;


/**
 * AvtoOrder
 *
 * @ORM\Table(name="avto_order")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AvtoOrderRepository")
 */
class AvtoOrder
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
     * @GRID\Column(title="район", searchOnClick="true")
     * @ORM\Column(name="district", type="string", length=255, nullable=true)
     */
    private $district;

    /**
     * @var string
     * @GRID\Column(title="адрес")
     * @ORM\Column(name="address", type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @var string
     * @GRID\Column(title="Цель")
     * @ORM\Column(name="reason", type="string", length=255, nullable=true)
     */
    private $reason;

    /**
     * @var string
     * @GRID\Column(title="сотрудник")
     * @ORM\Column(name="sender", type="string", length=255)
     */
    private $sender;

    /**
     * @var string
     * @GRID\Column(title="статус", searchOnClick="true")
     * @ORM\Column(name="status", type="string", length=255, nullable=true)
     */
    private $status;

    /**
     * @var string
     * @GRID\Column(title="Водитель")
     * @ORM\Column(name="driver", type="string", length=255, nullable=true)
     */
    private $driver;

    /**
     * @var \DateTime
     * @GRID\Column(title="подана", format="d.m.y H:i")
     * @ORM\Column(name="created", type="datetime", nullable=true)
     */
    private $created;



    public function __construct()
    {
        $this->created = new \DateTime();
        $this->status = 'Заявка подана';
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
     * Set district
     *
     * @param string $district
     *
     * @return AvtoOrder
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
     * Set address
     *
     * @param string $address
     *
     * @return AvtoOrder
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }


    /**
     * Set reason
     *
     * @param string $reason
     *
     * @return AvtoOrder
     */
    public function setReason($reason)
    {
        $this->reason = $reason;

        return $this;
    }

    /**
     * Get reason
     *
     * @return string
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * Set sender
     *
     * @param string $sender
     *
     * @return AvtoOrder
     */
    public function setSender($sender)
    {
        $this->sender = $sender;

        return $this;
    }

    /**
     * Get sender
     *
     * @return string
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return AvtoOrder
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set driver
     *
     * @param string $driver
     *
     * @return AvtoOrder
     */
    public function setDriver($driver)
    {
        $this->driver = $driver;

        return $this;
    }

    /**
     * Get driver
     *
     * @return string
     */
    public function getDriver()
    {
        return $this->driver;
    }

    /**
     * Set created
     *
     * @param string $created
     *
     * @return AvtoOrder
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return string
     */
    public function getCreated()
    {
        return $this->created;
    }
}

