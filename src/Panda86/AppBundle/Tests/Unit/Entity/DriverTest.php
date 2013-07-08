<?php

namespace Panda86\AppBundle\Tests\Unit\Entity;

use Panda86\AppBundle\Entity\Driver;

class DriverTest extends \PHPUnit_Framework_TestCase {

    private $args = array();

    public function setUp()
    {
        $this->args = array(
            'first_name' => 'John',
            'last_name' => 'Doe',
            'display_name' => 'John Doe',            
            'birth_date' => date('Y-m-d', strtotime('January 18, 1989')),
            'license_date' => date('Y-m-d', strtotime('January 20, 2005')),
            'license_ref' => 'WP14124519V',
            'address' => '456/B, New Strret, New Town',
            'mobile' => 94777123456,
            'created' => strtotime("+1 day 4 hours 2 seconds")
        );
    }

    public function testCanCreateDriver()
    {
        $driver =  new Driver($this->args);
        $this->assertInstanceOf('Panda86\AppBundle\Entity\Driver', $driver);
        return $driver;
    }

    /**
     * @depends testCanCreateDriver
     */
    public function testCanSetAttribs(Driver $driver)
    {
        $this->assertEquals($this->args['first_name'], $driver->getFirstName());
        $this->assertEquals($this->args['last_name'], $driver->getLastName());
        $this->assertEquals($this->args['display_name'], $driver->getDisplayName());
        $this->assertEquals($this->args['birth_date'], $driver->getBirthDate());
        $this->assertEquals($this->args['license_date'], $driver->getLicenseDate());
        $this->assertEquals($this->args['license_ref'], $driver->getLicenseRef());
        $this->assertEquals($this->args['address'], $driver->getAddress());
        $this->assertEquals($this->args['mobile'], $driver->getMobile());
        $this->assertEquals($this->args['created'], $driver->getCreated());
        //$this->assertEquals($this->args['created'], strtotime("+1 day 4 hours 3 seconds"));

    }
    


}
