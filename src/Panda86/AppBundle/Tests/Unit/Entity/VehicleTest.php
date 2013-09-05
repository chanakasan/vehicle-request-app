<?php

namespace Panda86\AppBundle\Tests\Unit\Entity;

use Panda86\AppBundle\Entity\VType;
use Panda86\AppBundle\Entity\Vehicle;
use Symfony\Component\Config\Definition\Exception\Exception;

class VehicleTest extends \PHPUnit_Framework_TestCase {

    private $args = array();

    public function setUp()
    {
        $this->args = array(
          'vtype' => new VType(array(
              'name' => '4-passenger-sedan',
              'descrip' => 'Standard car with four passenger seats'
          )),
          'make' => 'Toyota',
          'model' => 'Corolla',
          'reg_no' => 'WP NZB-5465',
          'passengers' => 4,
          'was_added' => new \DateTime('-5 months'),
        );
    }
    
    public function testCanCreateVehicle()
    {
        $vehicle =  new Vehicle($this->args);
        $this->assertInstanceOf('Panda86\AppBundle\Entity\Vehicle', $vehicle);
        return $vehicle;
    }


    /**
     * @depends testCanCreateVehicle
     */
    public function testHasDefaultValues(Vehicle $vehicle)
    {
        $this->assertEquals(true, $vehicle->getAc());
        $this->assertEquals(true, $vehicle->getIsCompanyOwned());
    }

    /**
     * 
     * @depends testCanCreateVehicle
     */
    public function testCanReadAttribs(Vehicle $vehicle)
    {
        $this->assertEquals($this->args['vtype'], $vehicle->getVtype());
        $this->assertEquals($this->args['make'], $vehicle->getMake());
        $this->assertEquals($this->args['model'], $vehicle->getModel());
        $this->assertEquals($this->args['reg_no'], $vehicle->getRegNo());
        $this->assertEquals($this->args['passengers'], $vehicle->getPassengers());
        $this->assertEquals($this->args['was_added'], $vehicle->getWasAdded());
    }
}
