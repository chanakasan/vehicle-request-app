<?php

namespace Panda86\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Panda86\AppBundle\Entity\Base;

class Driver extends Base {
    
    public function __construct(array $options = null)
    {
        $this->created = new \DateTime('now');
        $this->updated = new \DateTime('now');
        $this->mobile = '';

        parent::__construct($options);
    }

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $first_name;

    /**
     * @var string
     */
    protected $last_name;

    /**
     * @var string
     */
    protected $display_name;

    /**
     * @var \DateTime
     */
    protected $birth_date;

    /**
     * @var \DateTime
     */
    protected $license_date;

    /**
     * @var string
     */
    protected $license_ref;

    /**
     * @var string
     */
    protected $address;

    /**
     * @var integer
     */
    protected $mobile;

    /**
     * @var \DateTime
     */
    protected $created;


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
     * Set first_name
     *
     * @param string $firstName
     * @return Driver
     */
    public function setFirstName($firstName)
    {
        $this->first_name = $firstName;

        return $this;
    }

    /**
     * Get first_name
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * Set last_name
     *
     * @param string $lastName
     * @return Driver
     */
    public function setLastName($lastName)
    {
        $this->last_name = $lastName;

        return $this;
    }

    /**
     * Get last_name
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * Set display_name
     *
     * @param string $displayName
     * @return Driver
     */
    public function setDisplayName($displayName)
    {
        $this->display_name = $displayName;

        return $this;
    }

    /**
     * Get display_name
     *
     * @return string 
     */
    public function getDisplayName()
    {
        return $this->display_name;
    }

    /**
     * Set birth_date
     *
     * @param \DateTime $birthDate
     * @return Driver
     */
    public function setBirthDate($birthDate)
    {
        $this->birth_date = $birthDate;

        return $this;
    }

    /**
     * Get birth_date
     *
     * @return \DateTime 
     */
    public function getBirthDate()
    {
        return $this->birth_date;
    }

    /**
     * Set license_date
     *
     * @param \DateTime $licenseDate
     * @return Driver
     */
    public function setLicenseDate($licenseDate)
    {
        $this->license_date = $licenseDate;

        return $this;
    }

    /**
     * Get license_date
     *
     * @return \DateTime 
     */
    public function getLicenseDate()
    {
        return $this->license_date;
    }

    /**
     * Set license_ref
     *
     * @param string $licenseRef
     * @return Driver
     */
    public function setLicenseRef($licenseRef)
    {
        $this->license_ref = $licenseRef;

        return $this;
    }

    /**
     * Get license_ref
     *
     * @return string 
     */
    public function getLicenseRef()
    {
        return $this->license_ref;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return Driver
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set mobile
     *
     * @param integer $mobile
     * @return Driver
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;

        return $this;
    }

    /**
     * Get mobile
     *
     * @return integer 
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Driver
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
     * @var \DateTime
     */
    protected $updated;


    /**
     * Set updated
     *
     * @param \DateTime $updated
     * @return Driver
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
     * @var string
     */
    private $image;


    /**
     * Set image
     *
     * @param string $image
     * @return Driver
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }
}
