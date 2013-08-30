<?php

namespace Panda86\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CabService
 */
class CabService
{

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $hotline;

    /**
     * @var string
     */
    private $webSite;

    /**
     * @var string
     */
    private $address;

    /**
     * @var string
     */
    private $rates;

    /**
     * @var string
     */
    private $otherInfo;


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
     * Set name
     *
     * @param string $name
     * @return CabService
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set hotline
     *
     * @param string $hotline
     * @return CabService
     */
    public function setHotline($hotline)
    {
        $this->hotline = $hotline;

        return $this;
    }

    /**
     * Get hotline
     *
     * @return string 
     */
    public function getHotline()
    {
        return $this->hotline;
    }

    /**
     * Set webSite
     *
     * @param string $webSite
     * @return CabService
     */
    public function setWebSite($webSite)
    {
        $this->webSite = $webSite;

        return $this;
    }

    /**
     * Get webSite
     *
     * @return string 
     */
    public function getWebSite()
    {
        return $this->webSite;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return CabService
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
     * Set rates
     *
     * @param string $rates
     * @return CabService
     */
    public function setRates($rates)
    {
        $this->rates = $rates;

        return $this;
    }

    /**
     * Get rates
     *
     * @return string 
     */
    public function getRates()
    {
        return $this->rates;
    }

    /**
     * Set otherInfo
     *
     * @param string $otherInfo
     * @return CabService
     */
    public function setOtherInfo($otherInfo)
    {
        $this->otherInfo = $otherInfo;

        return $this;
    }

    /**
     * Get otherInfo
     *
     * @return string 
     */
    public function getOtherInfo()
    {
        return $this->otherInfo;
    }
}
