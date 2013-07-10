<?php

namespace Panda86\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Panda86\AppBundle\Entity\Base;

/**
 * RequestEmployee
 */
class RequestEmployee extends Base
{
    /**
     * Constructor
     */
    public function __construct(array $options = null)
    {
        $this->isOwner = false;

        parent::__construct($options);
    }

    /**
     * @var integer
     */
    protected $id;

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
     * @var boolean
     */
    protected $isOwner;

    /**
     * @var \Panda86\AppBundle\Entity\Request
     */
    protected $request;

    /**
     * @var \Panda86\AppBundle\Entity\Employee
     */
    protected $employee;


    /**
     * Set isOwner
     *
     * @param boolean $isOwner
     * @return RequestEmployee
     */
    public function setIsOwner($isOwner)
    {
        $this->isOwner = $isOwner;

        return $this;
    }

    /**
     * Get isOwner
     *
     * @return boolean 
     */
    public function getIsOwner()
    {
        return $this->isOwner;
    }

    /**
     * Set request
     *
     * @param \Panda86\AppBundle\Entity\Request $request
     * @return RequestEmployee
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
     * Set employee
     *
     * @param \Panda86\AppBundle\Entity\Employee $employee
     * @return RequestEmployee
     */
    public function setEmployee(\Panda86\AppBundle\Entity\Employee $employee = null)
    {
        $this->employee = $employee;

        return $this;
    }

    /**
     * Get employee
     *
     * @return \Panda86\AppBundle\Entity\Employee 
     */
    public function getEmployee()
    {
        return $this->employee;
    }
}
