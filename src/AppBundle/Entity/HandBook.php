<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use APY\DataGridBundle\Grid\Mapping as GRID;

/**
 * HandBook
 *
 * @ORM\Table(name="hand_book")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\HandBookRepository")
 */
class HandBook
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
     * @GRID\Column(title="ФИО")
     * @ORM\Column(name="fio", type="string", length=255, nullable=true)
     */
    private $fio;

    /**
     * @var string
     * @GRID\Column(title="Отдел", searchOnClick="true")
     * @ORM\Column(name="department", type="string", length=255, nullable=true)
     */
    private $department;

    /**
     * @var string
     * @GRID\Column(title="Должность", searchOnClick="true")
     * @ORM\Column(name="position", type="string", length=255, nullable=true)
     */
    private $position;

    /**
     * @var string
     * @GRID\Column(title="Email")
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var string
     * @GRID\Column(title="Короткий номер", size="30")
     * @ORM\Column(name="short_phone", type="string", length=255, nullable=true)
     */
    private $shortPhone;


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
     * Set fio
     *
     * @param string $fio
     *
     * @return HandBook
     */
    public function setFio($fio)
    {
        $this->fio = $fio;

        return $this;
    }

    /**
     * Get fio
     *
     * @return string
     */
    public function getFio()
    {
        return $this->fio;
    }

    /**
     * Set department
     *
     * @param string $department
     *
     * @return HandBook
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
     * Set position
     *
     * @param string $position
     *
     * @return HandBook
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return string
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return HandBook
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set shorPhone
     *
     * @param string $shortPhone
     *
     * @return HandBook
     */
    public function setShortPhone($shortPhone)
    {
        $this->shortPhone = $shortPhone;

        return $this;
    }

    /**
     * Get shorPhone
     *
     * @return string
     */
    public function getShortPhone()
    {
        return $this->shortPhone;
    }

}

