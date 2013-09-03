<?php

namespace Panda86\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Panda86\AppBundle\Entity\Base;
use Panda86\AppBundle\Entity\RequestLink;

class Request extends Base {

    const DEFAULT_JOURNEY_TYPE = 'single';
    const DEFAULT_PICKUP_LOC = 'ICTA';
    const DEFAULT_NO_DAYS = 1;
    const DEFAULT_START_TIME = null;
    const DEFAULT_RETURN_TIME = null;
    const DEFAULT_STATUS = 0;
    const APPROVED_STATUS = 1;
    const DISAPPROVED_STATUS = 2;

    protected $journey_opts = array('SINGLE', 'RETURN');
    protected $status_opts = array(self::DEFAULT_STATUS, self::APPROVED_STATUS, self::  DISAPPROVED_STATUS);

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
            if($status === $opt)
            {
                $this->status = $status;
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
        $this->start_time = self::DEFAULT_START_TIME;
        $this->return_time = self::DEFAULT_RETURN_TIME;

        $this->active = true;
        $this->created_at = new \DateTime('now');
        $this->updated_at = new \DateTime('now');

        $req_link = new RequestLink();
        $req_link->setRequest($this);
        $this->link = $req_link;

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
    protected $start_time;

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
    protected $more_info;

    /**
     * @var integer
     */
    protected $status;

    /**
     * @var boolean
     */
    protected $active;

    /**
     * @var \DateTime
     */
    protected $created_at;

    /**
     * @var \DateTime
     */
    protected $updated_at;

    /**
     * @var \Panda86\AppBundle\Entity\RequestAccomodation
     */
    protected $accomodation;

    /**
     * @var \Panda86\AppBundle\Entity\Employee
     */
    protected $requester;

    /**
     * @var \Panda86\AppBundle\Entity\VType
     */
    protected $vtype;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    protected $accompanied_by;


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
     * Set more_info
     *
     * @param string $moreInfo
     * @return Request
     */
    public function setMoreInfo($moreInfo)
    {
        $this->more_info = $moreInfo;

        return $this;
    }

    /**
     * Get more_info
     *
     * @return string 
     */
    public function getMoreInfo()
    {
        return $this->more_info;
    }

    /**
     * Get status
     *
     * @return integer 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set active
     *
     * @param boolean $active
     * @return Request
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
     * Set accomodation
     *
     * @param \Panda86\AppBundle\Entity\RequestAccomodation $accomodation
     * @return Request
     */
    public function setAccomodation(\Panda86\AppBundle\Entity\RequestAccomodation $accomodation = null)
    {
        $this->accomodation = $accomodation;

        return $this;
    }

    /**
     * Get accomodation
     *
     * @return \Panda86\AppBundle\Entity\RequestAccomodation 
     */
    public function getAccomodation()
    {
        return $this->accomodation;
    }

    /**
     * Set requester
     *
     * @param \Panda86\AppBundle\Entity\Employee $requester
     * @return Request
     */
    public function setRequester(\Panda86\AppBundle\Entity\Employee $requester)
    {
        $this->requester = $requester;

        return $this;
    }

    /**
     * Get requester
     *
     * @return \Panda86\AppBundle\Entity\Employee 
     */
    public function getRequester()
    {
        return $this->requester;
    }

    /**
     * Set vtype
     *
     * @param \Panda86\AppBundle\Entity\VType $vtype
     * @return Request
     */
    public function setVtype(\Panda86\AppBundle\Entity\VType $vtype)
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

    /**
     * Add accompanied_by
     *
     * @param \Panda86\AppBundle\Entity\Employee $accompaniedBy
     * @return Request
     */
    public function addAccompaniedBy(\Panda86\AppBundle\Entity\Employee $accompaniedBy)
    {
        $this->accompanied_by[] = $accompaniedBy;

        return $this;
    }

    /**
     * Remove accompanied_by
     *
     * @param \Panda86\AppBundle\Entity\Employee $accompaniedBy
     */
    public function removeAccompaniedBy(\Panda86\AppBundle\Entity\Employee $accompaniedBy)
    {
        $this->accompanied_by->removeElement($accompaniedBy);
    }

    /**
     * Get accompanied_by
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAccompaniedBy()
    {
        return $this->accompanied_by;
    }
    /**
     * @var \Panda86\AppBundle\Entity\RequestLink
     */
    private $link;


    /**
     * Set link
     *
     * @param \Panda86\AppBundle\Entity\RequestLink $link
     * @return Request
     */
    public function setLink(\Panda86\AppBundle\Entity\RequestLink $link = null)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return \Panda86\AppBundle\Entity\RequestLink 
     */
    public function getLink()
    {
        return $this->link;
    }
}
