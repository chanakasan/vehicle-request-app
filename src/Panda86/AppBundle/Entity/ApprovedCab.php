<?php

namespace Panda86\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ApprovedCab
 */
class ApprovedCab
{

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $voucher_no;

    /**
     * @var string
     */
    private $mileage;

    /**
     * @var float
     */
    private $cost;

    /**
     * @var string
     */
    private $other_info;

    /**
     * @var \Panda86\AppBundle\Entity\CabService
     */
    private $cab_service;


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
     * Set voucher_no
     *
     * @param string $voucherNo
     * @return ApprovedCab
     */
    public function setVoucherNo($voucherNo)
    {
        $this->voucher_no = $voucherNo;

        return $this;
    }

    /**
     * Get voucher_no
     *
     * @return string 
     */
    public function getVoucherNo()
    {
        return $this->voucher_no;
    }

    /**
     * Set mileage
     *
     * @param string $mileage
     * @return ApprovedCab
     */
    public function setMileage($mileage)
    {
        $this->mileage = $mileage;

        return $this;
    }

    /**
     * Get mileage
     *
     * @return string 
     */
    public function getMileage()
    {
        return $this->mileage;
    }

    /**
     * Set cost
     *
     * @param float $cost
     * @return ApprovedCab
     */
    public function setCost($cost)
    {
        $this->cost = $cost;

        return $this;
    }

    /**
     * Get cost
     *
     * @return float 
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * Set other_info
     *
     * @param string $otherInfo
     * @return ApprovedCab
     */
    public function setOtherInfo($otherInfo)
    {
        $this->other_info = $otherInfo;

        return $this;
    }

    /**
     * Get other_info
     *
     * @return string 
     */
    public function getOtherInfo()
    {
        return $this->other_info;
    }

    /**
     * Set cab_service
     *
     * @param \Panda86\AppBundle\Entity\CabService $cabService
     * @return ApprovedCab
     */
    public function setCabService(\Panda86\AppBundle\Entity\CabService $cabService = null)
    {
        $this->cab_service = $cabService;

        return $this;
    }

    /**
     * Get cab_service
     *
     * @return \Panda86\AppBundle\Entity\CabService 
     */
    public function getCabService()
    {
        return $this->cab_service;
    }
}
