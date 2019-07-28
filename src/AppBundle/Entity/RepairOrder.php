<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use APY\DataGridBundle\Grid\Mapping as GRID;

/**
 * RepairOrder
 *
 * @ORM\Table(name="repair_order")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RepairOrderRepository")
 */
class RepairOrder
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
     * @GRID\Column(title="район")
     * @ORM\Column(name="district", type="string", length=255, nullable=true)
     */
    private $district;

    /**
     * @var string
     * @GRID\Column(title="отдел")
     * @ORM\Column(name="department", type="string", length=255, nullable=true)
     */
    private $department;

    /**
     * @var string
     *@GRID\Column(title="тип техники")
     * @ORM\Column(name="type", type="string", length=255, nullable=true)
     */
    private $type;

    /**
     * @var string
     *@GRID\Column(title="инв. номер")
     * @ORM\Column(name="inv_num", type="string", length=255, nullable=true)
     */
    private $invNum;

    /**
     * @var string
     *@GRID\Column(title="причина")
     * @ORM\Column(name="reason", type="string", length=255, nullable=true)
     */
    private $reason;


    /**
     * @var \DateTime
     *@GRID\Column(title="подана", format="d.m.y H:i:s")
     * @ORM\Column(name="created", type="datetime", nullable=true)
     */
    private $created;

    /**
     * @var string
     *@GRID\Column(title="статус")
     * @ORM\Column(name="status", type="string", length=255, nullable=true)
     */
    private $status;

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
     * Set type
     *
     * @param string $type
     *
     * @return RepairOrder
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set invNum
     *
     * @param string $invNum
     *
     * @return RepairOrder
     */
    public function setInvNum($invNum)
    {
        $this->invNum = $invNum;

        return $this;
    }

    /**
     * Get invNum
     *
     * @return string
     */
    public function getInvNum()
    {
        return $this->invNum;
    }

    /**
     * Set reason
     *
     * @param string $reason
     *
     * @return RepairOrder
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
     * Set created
     *
     * @param \DateTime $created
     *
     * @return RepairOrder
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
     * Set status
     *
     * @param string $status
     *
     * @return RepairOrder
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
}

