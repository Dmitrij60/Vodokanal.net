<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use APY\DataGridBundle\Grid\Mapping as GRID;

/**
 * Improve
 *
 * @ORM\Table(name="improve")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ImproveRepository")
 */
class Improve
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @GRID\Column(size="40")
     */
    private $id;

    /**
     * @var string
     * @GRID\Column(title="Отправитель", searchOnClick="true", size="80")
     * @ORM\Column(name="sender", type="string", length=255, nullable=true)
     */
    private $sender;

    /**
     * @var string
     * @GRID\Column(title="Категория", searchOnClick="true", size="350")
     * @ORM\Column(name="category", type="string", length=255, nullable=true)
     */
    private $category;

    /**
     * @var string
     * @GRID\Column(title="Предложение")
     * @ORM\Column(name="suggestion", type="text")
     */
    private $suggestion;


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
     * Set sender
     *
     * @param string $sender
     *
     * @return Improve
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
     * Set category
     *
     * @param string $category
     *
     * @return Improve
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set suggestion
     *
     * @param string $suggestion
     *
     * @return Improve
     */
    public function setSuggestion($suggestion)
    {
        $this->suggestion = $suggestion;

        return $this;
    }

    /**
     * Get suggestion
     *
     * @return string
     */
    public function getSuggestion()
    {
        return $this->suggestion;
    }
}

