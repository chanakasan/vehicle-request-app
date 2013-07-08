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
        $this->created = new \DateTime('now');
        $this->updated = new \DateTime('now');

        parent::__construct($options);
    }

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $created;

    /**
     * @var \DateTime
     */
    private $updated;

    /**
     * @var \Panda86\AppBundle\Entity\Request
     */
    private $request;


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
}
