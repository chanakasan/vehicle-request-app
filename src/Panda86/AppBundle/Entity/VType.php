<?php

namespace Panda86\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Panda86\AppBundle\Entity\Base;

/**
 * VType
 */
class VType extends Base
{    
    /**
     * Constructor
     */
    public function __construct(array $options = null)
    {
        $this->vehicles = new \Doctrine\Common\Collections\ArrayCollection();

        parent::__construct($options);
    }
    
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $descrip;          

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
     * @return VType
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
     * @return VType
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
     * @var \Doctrine\Common\Collections\Collection
     */
    protected $vehicles;


    /**
     * Add vehicles
     *
     * @param \Panda86\AppBundle\Entity\Vehicle $vehicles
     * @return VType
     */
    public function addVehicle(\Panda86\AppBundle\Entity\Vehicle $vehicles = null)
    {
        $this->vehicles[] = $vehicles;

        return $this;
    }

    /**
     * Remove vehicles
     *
     * @param \Panda86\AppBundle\Entity\Vehicle $vehicles
     */
    public function removeVehicle(\Panda86\AppBundle\Entity\Vehicle $vehicles)
    {
        $this->vehicles->removeElement($vehicles);
    }

    /**
     * Get vehicles
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getVehicles()
    {
        return $this->vehicles;
    }
}
