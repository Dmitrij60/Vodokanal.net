<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use APY\DataGridBundle\Grid\Mapping as GRID;

/**
 * @ORM\Table(name="grid")
 * @ORM\Entity
 * @GRID\Source(columns="id, my_datetime")
 */
class MyEntity
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $my_datetime;
    public function __construct()
    {
        $this->my_datetime = new \DateTime();
    }
}

