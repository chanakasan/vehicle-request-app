<?php

namespace Panda86\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ApprovedRequest
 */
class DisapprovedRequest extends Base
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
     * @return DisapprovedRequest
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
     * @return DisapprovedRequest
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
     * @return DisapprovedRequest
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
     * @return DisapprovedRequest
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
     * @var boolean
     */
    protected  $active;

    /**
     * @var string
     */
    protected  $message;


    /**
     * Set active
     *
     * @param boolean $active
     * @return DisapprovedRequest
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
     * @return DisapprovedRequest
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
}
