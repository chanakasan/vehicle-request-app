<?php

namespace Panda86\UserBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 */
class User extends BaseUser
{
    /**
     * @var integer
     */
    protected  $id;

    /**
     * @var string
     */
    protected $first_name;

    /**
     * @var string
     */
    protected $last_name;

    /**
     * @var boolean
     */
    protected $is_admin;

    /**
     * @var boolean
     */
    protected $is_manager;


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
     * @return User
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
     * @return User
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
     * Set is_admin
     *
     * @param boolean $isAdmin
     * @return User
     */
    public function setIsAdmin($isAdmin)
    {
        $this->is_admin = $isAdmin;

        return $this;
    }

    /**
     * Get is_admin
     *
     * @return boolean
     */
    public function getIsAdmin()
    {
        return $this->is_admin;
    }

    /**
     * Set is_manager
     *
     * @param boolean $isManager
     * @return User
     */
    public function setIsManager($isManager)
    {
        $this->is_manager = $isManager;

        return $this;
    }

    /**
     * Get is_manager
     *
     * @return boolean
     */
    public function getIsManager()
    {
        return $this->is_manager;
    }


}