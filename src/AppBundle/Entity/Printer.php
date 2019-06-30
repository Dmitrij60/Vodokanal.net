<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Printer
 *
 * @ORM\Table(name="printer")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PrinterRepository")
 */
class Printer
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
     * @ORM\Column(name="printerModel", type="string", length=255, unique=true)
     */
    private $printerModel;

    /**
     * @var string
     *
     * @ORM\Column(name="discription", type="text", nullable=true)
     */
    private $discription;


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
     * Set printerModel
     *
     * @param string $printerModel
     *
     * @return Printer
     */
    public function setPrinterModel($printerModel)
    {
        $this->printerModel = $printerModel;

        return $this;
    }

    /**
     * Get printerModel
     *
     * @return string
     */
    public function getPrinterModel()
    {
        return $this->printerModel;
    }

    /**
     * Set discription
     *
     * @param string $discription
     *
     * @return Printer
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
}

