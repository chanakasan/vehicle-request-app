<?php

namespace Panda86\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Request_Employee
 */
class Request_Employee
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var boolean
     */
    private $isOwner;


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
     * Set isOwner
     *
     * @param boolean $isOwner
     * @return Request_Employee
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
     * @var \Panda86\UserBundle\Entity\Request
     */
    private $request;

    /**
     * @var \Panda86\UserBundle\Entity\Employee
     */
    private $employee;


    /**
     * Set request
     *
     * @param \Panda86\UserBundle\Entity\Request $request
     * @return Request_Employee
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
     * @return Request_Employee
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
