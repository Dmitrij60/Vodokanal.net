<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     *
     * @ORM\Column(name="fio", type="string", length=255, nullable=true)
     */
    private $fio;

    /**
     * @var string
     *
     * @ORM\Column(name="department", type="string", length=255, nullable=true)
     */
    private $department;

    /**
     * @var string
     *
     * @ORM\Column(name="position", type="string", length=255, nullable=true)
     */
    private $position;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="short_phone", type="string", length=255, nullable=true)
     */
    private $shortPhone;

    /**
     * @var string
     *
     * @ORM\Column(name="long_phone", type="string", length=255, nullable=true)
     */
    private $longPhone;


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

    /**
     * Set longPhone
     *
     * @param string $longPhone
     *
     * @return HandBook
     */
    public function setLongPhone($longPhone)
    {
        $this->longPhone = $longPhone;

        return $this;
    }

    /**
     * Get longPhone
     *
     * @return string
     */
    public function getLongPhone()
    {
        return $this->longPhone;
    }
}

