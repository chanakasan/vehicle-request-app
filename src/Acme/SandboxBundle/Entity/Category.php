<?php

namespace Acme\SandboxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Category
 */
class Category
{

    /**
     * Constructor
     */
    function __construct()
    {
        $this->tasks = new ArrayCollection();
    }


    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $descrip;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $tasks;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Category
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set descrip
     *
     * @param string $descrip
     * @return Category
     */
    public function setDescrip($descrip)
    {
        $this->descrip = $descrip;

        return $this;
    }

    /**
     * Get descrip
     *
     * @return string 
     */
    public function getDescrip()
    {
        return $this->descrip;
    }

    /**
     * Add tasks
     *
     * @param \Acme\SandboxBundle\Entity\Task $tasks
     * @return Category
     */
    public function addTask(\Acme\SandboxBundle\Entity\Task $tasks)
    {
        $this->tasks[] = $tasks;

        return $this;
    }

    /**
     * Remove tasks
     *
     * @param \Acme\SandboxBundle\Entity\Task $tasks
     */
    public function removeTask(\Acme\SandboxBundle\Entity\Task $tasks)
    {
        $this->tasks->removeElement($tasks);
    }

    /**
     * Get tasks
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTasks()
    {
        return $this->tasks;
    }
}
