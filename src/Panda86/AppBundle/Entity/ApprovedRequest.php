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
        $this->active = true;
        $this->created = new \DateTime('now');
        $this->updated = new \DateTime('now');

        parent::__construct($options);
    }

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $remarks;

    /**
     * @var \DateTime
     */
    protected $created;

    /**
     * @var \DateTime
     */
    protected $updated;

    /**
     * @var \Panda86\AppBundle\Entity\Request
     */
    protected $request;

    /**
     * @var \Panda86\AppBundle\Entity\Vehicle
     */
    protected $vehicle;

    /**
     * @var \Panda86\AppBundle\Entity\Driver
     */
    protected $driver;


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
     * Set remarks
     *
     * @param string $remarks
     * @return ApprovedRequest
     */
    public function setRemarks($remarks)
    {
        $this->remarks = $remarks;

        return $this;
    }

    /**
     * Get remarks
     *
     * @return string 
     */
    public function getRemarks()
    {
        return $this->remarks;
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
    public function setRequest(\Panda86\AppBundle\Entity\Request $request)
    {
        $request->setStatus(1); /* Mark request as approved */
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
    public function setVehicle(\Panda86\AppBundle\Entity\Vehicle $vehicle)
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
    public function setDriver(\Panda86\AppBundle\Entity\Driver $driver)
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
    /**
     * @var boolean
     */
    protected  $active;

    /**
     * @var string
     */
    protected $message;


    /**
     * Set active
     *
     * @param boolean $active
     * @return ApprovedRequest
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean 
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set message
     *
     * @param string $message
     * @return ApprovedRequest
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string 
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @var \Panda86\AppBundle\Entity\ApprovedCab
     */
    private $cab;


    /**
     * Set cab
     *
     * @param \Panda86\AppBundle\Entity\ApprovedCab $cab
     * @return ApprovedRequest
     */
    public function setCab(\Panda86\AppBundle\Entity\ApprovedCab $cab = null)
    {
        $this->cab = $cab;

        return $this;
    }

    /**
     * Get cab
     *
     * @return \Panda86\AppBundle\Entity\ApprovedCab 
     */
    public function getCab()
    {
        return $this->cab;
    }

    /**
     * @var \Panda86\UserBundle\Entity\User
     */
    private $approved_by;


    /**
     * Set approved_by
     *
     * @param \Panda86\UserBundle\Entity\User $approvedBy
     * @return ApprovedRequest
     */
    public function setApprovedBy(\Panda86\UserBundle\Entity\User $approvedBy)
    {
        $this->approved_by = $approvedBy;

        return $this;
    }

    /**
     * Get approved_by
     *
     * @return \Panda86\UserBundle\Entity\User 
     */
    public function getApprovedBy()
    {
        return $this->approved_by;
    }
}
