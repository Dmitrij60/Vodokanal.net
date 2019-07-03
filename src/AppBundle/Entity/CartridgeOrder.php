<?php


namespace AppBundle\Entity;


class CartridgeOrder
{
    protected $cartridgeModel;
    protected $printerModel;
    protected $district;
    protected $department;
    protected $dueDate;
    protected $isAttending;

    public function getCartridgeModel()
    {
        return $this->cartridgeModel;
    }

    public function setCartridgeModel($cartridgeModel)
    {
        $this->cartridgeModel = $cartridgeModel;
    }

    public function getPrinterModel()
    {
        return $this->printerModel;
    }

    public function setPrinterModel($printerModel)
    {
        $this->printerModel = $printerModel;
    }

    public function getDistrict()
    {
        return $this->district;
    }

    public function setDistrict($district)
    {
        $this->district = $district;
    }

    public function getDepartment()
    {
        return $this->department;
    }

    public function setDepartment($department)
    {
        $this->department = $department;
    }

    public function getDueDate()
    {
        return $this->dueDate;
    }

    public function setDueDate(\DateTime $dueDate = null)
    {
        $this->dueDate = $dueDate;
    }

    public function getisAttending()
    {
        return $this->isAttending;
    }

    public function setisAttending($isAttending)
    {
        $this->isAttending = $isAttending;
    }
}