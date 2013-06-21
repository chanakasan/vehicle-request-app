<?php

namespace Panda86\AppBundle\Tests\Unit\Entity;

use Panda86\AppBundle\Entity\Driver;
use Symfony\Component\Config\Definition\Exception\Exception;

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
            'created' => new \DateTime('now')
        );
    }

    public function testCanCreateDriver()
    {
        $driver =  new Driver();
        $this->assertInstanceOf('Panda86\AppBundle\Entity\Driver', $driver);
    }
    
    public function testCanSetAttribs()
    {
        $driver =  new Driver();
        $driver->setFirstName($this->args['first_name']);        
        $driver->setLastName($this->args['last_name']);
        $driver->setBirthDate($this->args['birth_date']);
        return $driver;
    }      

    /**
     * @depends testCanSetAttribs
     */
    public function testCanGetAttribs(Driver $driver)
    {
        $this->assertEquals($this->args['first_name'], $driver->getFirstName());        
        $this->assertEquals($this->args['last_name'], $driver->getLastName());        
        $this->assertEquals($this->args['birth_date'], $driver->getBirthDate());        
    }
    
    


}
