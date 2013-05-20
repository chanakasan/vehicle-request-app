<?php

namespace Panda86\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

class Vehicle {

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $type;

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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Vehicle
     */
    public function setType($type)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
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
     * @var integer
     */
    private $passenger_no;

    /**
     * @var boolean
     */
    private $ac;

    /**
     * @var string
     */
    private $remarks;


    /**
     * Set passenger_no
     *
     * @param integer $passengerNo
     * @return Vehicle
     */
    public function setPassengerNo($passengerNo)
    {
        $this->passenger_no = $passengerNo;

        return $this;
    }

    /**
     * Get passenger_no
     *
     * @return integer 
     */
    public function getPassengerNo()
    {
        return $this->passenger_no;
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
}
