<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * WebInterfacePass
 *
 * @ORM\Table(name="web_interface_pass")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\WebInterfacePassRepository")
 */
class WebInterfacePass
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
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=255, nullable=true)
     */
    private $ip;

    /**
     * @var string
     *
     * @ORM\Column(name="login", type="string", length=255, nullable=true)
     */
    private $login;

    /**
     * @var string
     *
     * @ORM\Column(name="pass", type="string", length=255, nullable=true)
     */
    private $pass;

    /**
     * @var string
     *
     * @ORM\Column(name="comm", type="string", length=255, nullable=true)
     */
    private $comm;


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
     * Set title
     *
     * @param string $title
     *
     * @return WebInterfacePass
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set ip
     *
     * @param string $ip
     *
     * @return WebInterfacePass
     */
    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Get ip
     *
     * @return string
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set login
     *
     * @param string $login
     *
     * @return WebInterfacePass
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get login
     *
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set pass
     *
     * @param string $pass
     *
     * @return WebInterfacePass
     */
    public function setPass($pass)
    {
        $this->pass = $pass;

        return $this;
    }

    /**
     * Get pass
     *
     * @return string
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * Set comm
     *
     * @param string $comm
     *
     * @return WebInterfacePass
     */
    public function setComm($comm)
    {
        $this->comm = $comm;

        return $this;
    }

    /**
     * Get comm
     *
     * @return string
     */
    public function getComm()
    {
        return $this->comm;
    }
}

