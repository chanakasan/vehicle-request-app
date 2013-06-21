<?php

namespace Panda86\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

class Vehicle 
{
    public function __construct()
    {
        $this->added = new \DateTime;
    }
  
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $make;

    /**
     * @var string
     */
    private $model;

    /**
     * @var string
     */
    private $reg_no;

    /**
     * @var integer
     */
    private $passengers;

    /**
     * @var boolean
     */
    private $ac;

    /**
     * @var string
     */
    private $remarks;

    /**
     * @var boolean
     */
    private $company_owned;

    /**
     * @var \DateTime
     */
    private $added;

    /**
     * @var \Panda86\AppBundle\Entity\VType
     */
    private $vtype;


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
     * Set make
     *
     * @param string $make
     * @return Vehicle
     */
    public function setMake($make)
    {
        $this->make = $make;

        return $this;
    }

    /**
     * Get make
     *
     * @return string 
     */
    public function getMake()
    {
        return $this->make;
    }

    /**
     * Set model
     *
     * @param string $model
     * @return Vehicle
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model
     *
     * @return string 
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set reg_no
     *
     * @param string $regNo
     * @return Vehicle
     */
    public function setRegNo($regNo)
    {
        $this->reg_no = $regNo;

        return $this;
    }

    /**
     * Get reg_no
     *
     * @return string 
     */
    public function getRegNo()
    {
        return $this->reg_no;
    }

    /**
     * Set passengers
     *
     * @param integer $passengers
     * @return Vehicle
     */
    public function setPassengers($passengers)
    {
        $this->passengers = $passengers;

        return $this;
    }

    /**
     * Get passengers
     *
     * @return integer 
     */
    public function getPassengers()
    {
        return $this->passengers;
    }

    /**
     * Set ac
     *
     * @param boolean $ac
     * @return Vehicle
     */
    public function setAc($ac)
    {
        $this->ac = $ac;

        return $this;
    }

    /**
     * Get ac
     *
     * @return boolean 
     */
    public function getAc()
    {
        return $this->ac;
    }

    /**
     * Set remarks
     *
     * @param string $remarks
     * @return Vehicle
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
     * Set company_owned
     *
     * @param boolean $companyOwned
     * @return Vehicle
     */
    public function setCompanyOwned($companyOwned)
    {
        $this->company_owned = $companyOwned;

        return $this;
    }

    /**
     * Get company_owned
     *
     * @return boolean 
     */
    public function getCompanyOwned()
    {
        return $this->company_owned;
    }

    /**
     * Set added
     *
     * @param \DateTime $added
     * @return Vehicle
     */
    public function setAdded($added)
    {
        $this->added = $added;

        return $this;
    }

    /**
     * Get added
     *
     * @return \DateTime 
     */
    public function getAdded()
    {
        return $this->added;
    }

    /**
     * Set vtype
     *
     * @param \Panda86\AppBundle\Entity\VType $vtype
     * @return Vehicle
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
