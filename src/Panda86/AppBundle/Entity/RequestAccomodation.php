<?php

namespace Panda86\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RequestAccomodation
 */
class RequestAccomodation
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $no_days;

    /**
     * @var string
     */
    private $day_rate;

    /**
     * @var string
     */
    private $total_fee;

    /**
     * @var string
     */
    private $descrip;


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
     * Set no_days
     *
     * @param integer $noDays
     * @return RequestAccomodation
     */
    public function setNoDays($noDays)
    {
        $this->no_days = $noDays;

        return $this;
    }

    /**
     * Get no_days
     *
     * @return integer 
     */
    public function getNoDays()
    {
        return $this->no_days;
    }

    /**
     * Set day_rate
     *
     * @param string $dayRate
     * @return RequestAccomodation
     */
    public function setDayRate($dayRate)
    {
        $this->day_rate = $dayRate;

        return $this;
    }

    /**
     * Get day_rate
     *
     * @return string 
     */
    public function getDayRate()
    {
        return $this->day_rate;
    }

    /**
     * Set total_fee
     *
     * @param string $totalFee
     * @return RequestAccomodation
     */
    public function setTotalFee($totalFee)
    {
        $this->total_fee = $totalFee;

        return $this;
    }

    /**
     * Get total_fee
     *
     * @return string 
     */
    public function getTotalFee()
    {
        return $this->total_fee;
    }

    /**
     * Set descrip
     *
     * @param string $descrip
     * @return RequestAccomodation
     */
    public function setDescrip($descrip)
    {
        $this->descrip = $descrip;

        return $this;
    }

    /**
     * Get descrip
     *
     * @return string 
     */
    public function getDescrip()
    {
        return $this->descrip;
    }
}
