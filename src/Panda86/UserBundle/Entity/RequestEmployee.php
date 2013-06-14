<?php

namespace Panda86\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RequestEmployee
 */
class RequestEmployee
{
    /**
     * @var integer
     */
    private $id;


    /**
     * Constructor
     */
    public function __construct(array $options = null)
    {
        $this->isOwner = false;
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
     * @var boolean
     */
    private $isOwner;

    /**
     * @var \Panda86\UserBundle\Entity\Request
     */
    private $request;

    /**
     * @var \Panda86\UserBundle\Entity\Employee
     */
    private $employee;


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
     * @param \Panda86\UserBundle\Entity\Request $request
     * @return RequestEmployee
     */
    public function setRequest(\Panda86\UserBundle\Entity\Request $request = null)
    {
        $this->request = $request;

        return $this;
    }

    /**
     * Get request
     *
     * @return \Panda86\UserBundle\Entity\Request 
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * Set employee
     *
     * @param \Panda86\UserBundle\Entity\Employee $employee
     * @return RequestEmployee
     */
    public function setEmployee(\Panda86\UserBundle\Entity\Employee $employee = null)
    {
        $this->employee = $employee;

        return $this;
    }

    /**
     * Get employee
     *
     * @return \Panda86\UserBundle\Entity\Employee 
     */
    public function getEmployee()
    {
        return $this->employee;
    }
}
