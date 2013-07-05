<?php

namespace Panda86\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Panda86\AppBundle\Entity\Base;

class Vehicle extends Base
{
    public function __construct(array $options = null)
    {
        $this->ac = true;
        $this->remarks ='';
        $this->was_added = new \DateTime('now');
        $this->setIsCompanyOwned(true);

        parent::__construct($options);
    }

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $make;

    /**
     * @var string
     */
    protected $model;

    /**
     * @var string
     */
    protected $reg_no;

    /**
     * @var integer
     */
    protected $passengers;

    /**
     * @var boolean
     */
    protected $ac;

    /**
     * @var string
     */
    protected $remarks;

    /**
     * @var boolean
     */
    protected $is_company_owned;

    /**
     * @var \DateTime
     */
    protected $was_added;

    /**
     * @var \Panda86\AppBundle\Entity\VType
     */
    protected $vtype;


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
     * Set is_company_owned
     *
     * @param boolean $isCompanyOwned
     * @return Vehicle
     */
    public function setIsCompanyOwned($isCompanyOwned)
    {
        $this->is_company_owned = $isCompanyOwned;

        return $this;
    }

    /**
     * Get is_company_owned
     *
     * @return boolean 
     */
    public function getIsCompanyOwned()
    {
        return $this->is_company_owned;
    }

    /**
     * Set was_added
     *
     * @param \DateTime $wasAdded
     * @return Vehicle
     */
    public function setWasAdded($wasAdded)
    {
        $this->was_added = $wasAdded;

        return $this;
    }

    /**
     * Get was_added
     *
     * @return \DateTime 
     */
    public function getWasAdded()
    {
        return $this->was_added;
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
    /**
     * @var string
     */
    private $image;


    /**
     * Set image
     *
     * @param string $image
     * @return Vehicle
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

    public function getFullImagePath()
    {
        return null === $this->image
            ? null
            : $this->getImageUploadRootDir().'/'.$this->image;
    }

    public function getImageWebPath()
    {
        return null === $this->image
            ? null
            : $this->getImageUploadDir().'/'.$this->image;
    }

    public function getImageUploadRootDir()
    {
        // the absolute directory path where uploaded
        // documents should be saved
        return __DIR__.'/../../../../web/'.$this->getImageUploadDir();
    }

    public function getImageUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'uploads/images/vehicles';
    }
}
