<?php

namespace Panda86\AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

class Driver {

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $first_name;

    /**
     * @var string
     */
    private $last_name;

    /**
     * @var string
     */
    private $display_name;

    /**
     * @var string
     */
    private $address;

    /**
     * @var \DateTime
     */
    private $birth_date;

    /**
     * @var \DateTime
     */
    private $license_date;

    /**
     * @var string
     */
    private $license_ref;


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
}
