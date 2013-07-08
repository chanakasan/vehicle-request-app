<?php

namespace Panda86\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ApprovedRequest
 */
class ApprovedRequest extends Base
{
    /**
     * Constructor
     */
    public function __construct(array $options = null)
    {
        $this->created = new \DateTime('now');
        $this->updated = new \DateTime('now');

        parent::__construct($options);
    }

  
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $created;

    /**
     * @var \DateTime
     */
    private $updated;

    /**
     * @var \Panda86\AppBundle\Entity\Request
     */
    private $request;

    /**
     * @var \Panda86\AppBundle\Entity\Vehicle
     */
    private $vehicle;

    /**
     * @var \Panda86\AppBundle\Entity\Driver
     */
    private $driver;


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
     * Set created
     *
     * @param \DateTime $created
     * @return ApprovedRequest
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
     * Set updated
     *
     * @param \DateTime $updated
     * @return ApprovedRequest
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime 
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set request
     *
     * @param \Panda86\AppBundle\Entity\Request $request
     * @return ApprovedRequest
     */
    public function setRequest(\Panda86\AppBundle\Entity\Request $request = null)
    {
        $this->request = $request;

        return $this;
    }

    /**
     * Get request
     *
     * @return \Panda86\AppBundle\Entity\Request 
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * Set vehicle
     *
     * @param \Panda86\AppBundle\Entity\Vehicle $vehicle
     * @return ApprovedRequest
     */
    public function setVehicle(\Panda86\AppBundle\Entity\Vehicle $vehicle = null)
    {
        $this->vehicle = $vehicle;

        return $this;
    }

    /**
     * Get vehicle
     *
     * @return \Panda86\AppBundle\Entity\Vehicle 
     */
    public function getVehicle()
    {
        return $this->vehicle;
    }

    /**
     * Set driver
     *
     * @param \Panda86\AppBundle\Entity\Driver $driver
     * @return ApprovedRequest
     */
    public function setDriver(\Panda86\AppBundle\Entity\Driver $driver = null)
    {
        $this->driver = $driver;

        return $this;
    }

    /**
     * Get driver
     *
     * @return \Panda86\AppBundle\Entity\Driver 
     */
    public function getDriver()
    {
        return $this->driver;
    }
}
