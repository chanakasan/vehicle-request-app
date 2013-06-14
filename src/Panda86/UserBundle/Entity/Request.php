<?php

namespace Panda86\UserBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

class Request {

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $requested_for;

    /**
     * @var string
     */
    private $journey_type;

    /**
     * @var \DateTime
     */
    private $start_time;

    /**
     * @var string
     */
    private $start_loc;

    /**
     * @var \DateTime
     */
    private $pickup_time;

    /**
     * @var string
     */
    private $pickup_loc;

    /**
     * @var \DateTime
     */
    private $end_time;

    /**
     * @var string
     */
    private $end_loc;

    /**
     * @var string
     */
    private $vehicle_type;

    /**
     * @var string
     */
    private $purpose;

    /**
     * @var string
     */
    private $accompanied_by;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * Constructor
     */
    public function __construct(array $options = null)
    {
        $this->start_loc = 'ICTA';
        $this->start_time = new \DateTime('now');
        $this->pickup_time = new \DateTime('now');
        $this->end_time = new \DateTime('now');
        $this->created_at = new \DateTime('now');

        if(is_array($options)) {
            $this->setOptions($options);
        }

    }

    /**
     * Set constructor options dynamically
     *
     * @param array $options
     * @return $this
     */
    public function setOptions(array $options)
    {
        $class_attr = get_object_vars($this);
        foreach($options as $key => $val)
        {
            $attr = $key;
            if(array_key_exists($attr, $class_attr))
            {
                $this->$attr = $val;
            }
        }
        return $this;
    }

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
     * Set requestedFor
     *
     * @param string $requestedFor
     * @return Request
     */
    public function setRequestedFor($requestedFor)
    {
        $this->requested_for = $requestedFor;

        return $this;
    }

    /**
     * Get requestedFor
     *
     * @return string 
     */
    public function getRequestedFor()
    {
        return $this->requested_for;
    }

    /**
     * Set journey_type
     *
     * @param string $journeyType
     * @return Request
     */
    public function setJourneyType($journeyType)
    {
        $this->journey_type = $journeyType;

        return $this;
    }

    /**
     * Get journey_type
     *
     * @return string 
     */
    public function getJourneyType()
    {
        return $this->journey_type;
    }

    /**
     * Set start_time
     *
     * @param \DateTime $startTime
     * @return Request
     */
    public function setStartTime($startTime)
    {
        $this->start_time = $startTime;

        return $this;
    }

    /**
     * Get start_time
     *
     * @return \DateTime 
     */
    public function getStartTime()
    {
        return $this->start_time;
    }

    /**
     * Set start_loc
     *
     * @param string $startLoc
     * @return Request
     */
    public function setStartLoc($startLoc)
    {
        $this->start_loc = $startLoc;

        return $this;
    }

    /**
     * Get start_loc
     *
     * @return string 
     */
    public function getStartLoc()
    {
        return $this->start_loc;
    }

    /**
     * Set pickup_time
     *
     * @param \DateTime $pickupTime
     * @return Request
     */
    public function setPickupTime($pickupTime)
    {
        $this->pickup_time = $pickupTime;

        return $this;
    }

    /**
     * Get pickup_time
     *
     * @return \DateTime 
     */
    public function getPickupTime()
    {
        return $this->pickup_time;
    }

    /**
     * Set pickup_loc
     *
     * @param string $pickupLoc
     * @return Request
     */
    public function setPickupLoc($pickupLoc)
    {
        $this->pickup_loc = $pickupLoc;

        return $this;
    }

    /**
     * Get pickup_loc
     *
     * @return string 
     */
    public function getPickupLoc()
    {
        return $this->pickup_loc;
    }

    /**
     * Set end_time
     *
     * @param \DateTime $endTime
     * @return Request
     */
    public function setEndTime($endTime)
    {
        $this->end_time = $endTime;

        return $this;
    }

    /**
     * Get end_time
     *
     * @return \DateTime 
     */
    public function getEndTime()
    {
        return $this->end_time;
    }

    /**
     * Set end_loc
     *
     * @param string $endLoc
     * @return Request
     */
    public function setEndLoc($endLoc)
    {
        $this->end_loc = $endLoc;

        return $this;
    }

    /**
     * Get end_loc
     *
     * @return string 
     */
    public function getEndLoc()
    {
        return $this->end_loc;
    }

    /**
     * Set vehicle_type
     *
     * @param string $vehicleType
     * @return Request
     */
    public function setVehicleType($vehicleType)
    {
        $this->vehicle_type = $vehicleType;

        return $this;
    }

    /**
     * Get vehicle_type
     *
     * @return string 
     */
    public function getVehicleType()
    {
        return $this->vehicle_type;
    }

    /**
     * Set purpose
     *
     * @param string $purpose
     * @return Request
     */
    public function setPurpose($purpose)
    {
        $this->purpose = $purpose;

        return $this;
    }

    /**
     * Get purpose
     *
     * @return string 
     */
    public function getPurpose()
    {
        return $this->purpose;
    }

    /**
     * Set accompaniedBy
     *
     * @param string $accompaniedBy
     * @return Request
     */
    public function setAccompaniedBy($accompaniedBy)
    {
        $this->accompanied_by = $accompaniedBy;

        return $this;
    }

    /**
     * Get accompaniedBy
     *
     * @return string
     */
    public function getAccompaniedBy()
    {
        return $this->accompanied_by;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return Request
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;

        return $this;
    }

    /**
     * Get created_at
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $employees;


    /**
     * Add employees
     *
     * @param \Panda86\UserBundle\Entity\Employee $employees
     * @return Request
     */
    public function addEmployee(\Panda86\UserBundle\Entity\Employee $employees)
    {
        $this->employees[] = $employees;

        return $this;
    }

    /**
     * Remove employees
     *
     * @param \Panda86\UserBundle\Entity\Employee $employees
     */
    public function removeEmployee(\Panda86\UserBundle\Entity\Employee $employees)
    {
        $this->employees->removeElement($employees);
    }

    /**
     * Get employees
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEmployees()
    {
        return $this->employees;
    }
}
