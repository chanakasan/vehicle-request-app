<?php

namespace Panda86\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RequestLink
 */
class RequestLink
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $code;


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
     * Set code
     *
     * @param string $code
     * @return RequestLink
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode()
    {
        return $this->code;
    }
    /**
     * @var \Panda86\AppBundle\Entity\Request
     */
    private $request;


    /**
     * Set request
     *
     * @param \Panda86\AppBundle\Entity\Request $request
     * @return RequestLink
     */
    public function setRequest(\Panda86\AppBundle\Entity\Request $request)
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
}
