<?php

namespace Panda86\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Panda86\AppBundle\Entity\Base;

class Request extends Base {

    const DEFAULT_JOURNEY_TYPE = 'single';
    const DEFAULT_PICKUP_LOC = 'ICTA';
    const DEFAULT_NO_DAYS = 1;
    const DEFAULT_RETURN_TIME = null;
    const DEFAULT_STATUS = 'pending';

    protected $journey_opts = array('SINGLE', 'RETURN');
    protected $status_opts = array('PENDING', 'APPROVED', 'DISAPPROVED');

    /**
     * Set status
     *
     * @param string $status
     * @return Request
     */
    public function setStatus($status)
    {
        foreach($this->status_opts as $opt)
        {
            if(strtoupper($status) === $opt)
            {
                $this->status = strtolower($status);
                return $this;
            }
        }
        throw new \InvalidArgumentException('Invalid status: '.$status);
    }

    /**
     * Set journey_type
     *
     * @param string $journeyType
     * @return Request
     */
    public function setJourneyType($journeyType)
    {
        foreach($this->journey_opts as $opt)
        {
            if(strtoupper($journeyType) === $opt)
            {
                $this->journey_type = strtolower($journeyType);
                return $this;
            }
        }
        throw new \InvalidArgumentException('Invalid journey type: '.$journeyType);
    }

    /**
     * Constructor
     */
    public function __construct(array $options = null)
    {
        $this->status = self::DEFAULT_STATUS;
        $this->journey_type = self::DEFAULT_JOURNEY_TYPE;
        $this->days = self::DEFAULT_NO_DAYS;
        $this->pickup_loc = self::DEFAULT_PICKUP_LOC;
        $this->return_time = self::DEFAULT_RETURN_TIME;

        $this->created_at = new \DateTime('now');
        $this->updated_at = new \DateTime('now');

        parent::__construct($options);
    }
   
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $journey_type;

    /**
     * @var integer
     */
    protected $days;

    /**
     * @var string
     */
    protected $pickup_loc;

    /**
     * @var \DateTime
     */
    protected $pickup_time;

    /**
     * @var string
     */
    protected $destination;

    /**
     * @var \DateTime
     */
    protected $return_time;

    /**
     * @var string
     */
    protected $purpose;

    /**
     * @var string
     */
    protected $status;

    /**
     * @var \DateTime
     */
    protected $created_at;

    /**
     * @var \DateTime
     */
    protected $updated_at;

    /**
     * @var \Panda86\AppBundle\Entity\VType
     */
    protected $vtype;


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
     * Get journey_type
     *
     * @return string 
     */
    public function getJourneyType()
    {
        return $this->journey_type;
    }

    /**
     * Set days
     *
     * @param integer $days
     * @return Request
     */
    public function setDays($days)
    {
        $this->days = $days;

        return $this;
    }

    /**
     * Get days
     *
     * @return integer 
     */
    public function getDays()
    {
        return $this->days;
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
     * Set destination
     *
     * @param string $destination
     * @return Request
     */
    public function setDestination($destination)
    {
        $this->destination = $destination;

        return $this;
    }

    /**
     * Get destination
     *
     * @return string 
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * Set return_time
     *
     * @param \DateTime $returnTime
     * @return Request
     */
    public function setReturnTime($returnTime)
    {
        $this->return_time = $returnTime;

        return $this;
    }

    /**
     * Get return_time
     *
     * @return \DateTime 
     */
    public function getReturnTime()
    {
        return $this->return_time;
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
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
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
     * Set updated_at
     *
     * @param \DateTime $updatedAt
     * @return Request
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;

        return $this;
    }

    /**
     * Get updated_at
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Set vtype
     *
     * @param \Panda86\AppBundle\Entity\VType $vtype
     * @return Request
     */
    public function setVtype(\Panda86\AppBundle\Entity\VType $vtype = null)
    {
        $this->vtype = $vtype;

        return $this;
    }

    /**
     * Get vtype
     *
     * @return \Panda86\AppBundle\Entity\VType 
     */
    public function getVtype()
    {
        return $this->vtype;
    }

}
