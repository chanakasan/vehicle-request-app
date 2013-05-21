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
    private $journey_type;

    /**
     * @var string
     */
    private $start_time;

    /**
     * @var string
     */
    private $start_loc;

    /**
     * @var string
     */
    private $pickup_time;

    /**
     * @var string
     */
    private $pickup_loc;

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
    private $accompaniedBy;


    public function __construct()
    {
        $this->start_loc = 'ICTA';
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
     * @param string $startTime
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
     * @return string 
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
     * @param string $pickupTime
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
     * @return string 
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
        $this->accompaniedBy = $accompaniedBy;
    
        return $this;
    }

    /**
     * Get accompaniedBy
     *
     * @return string 
     */
    public function getAccompaniedBy()
    {
        return $this->accompaniedBy;
    }
}
