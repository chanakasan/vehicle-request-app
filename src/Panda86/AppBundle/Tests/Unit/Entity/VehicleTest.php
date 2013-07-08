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
          'is_company_owned' => true,
          'was_added' => strtotime("+1 week 2 days 4 hours 2 seconds")
        );
    }
    
    public function testCanCreateVehicle()
    {
        $vehicle =  new Vehicle();
        $this->assertInstanceOf('Panda86\AppBundle\Entity\Vehicle', $vehicle);
        return $vehicle;
    }

    /**
     * 
     * @depends testCanCreateVehicle
     */
    public function testCanSetAttribs(Vehicle $vehicle)
    {
        $vehicle->setVtype($this->args['vtype']);
        $vehicle->setMake($this->args['make']);
        $vehicle->setModel($this->args['model']);
        $vehicle->setRegNo($this->args['reg_no']);
        $vehicle->setPassengers($this->args['passengers']);
        $vehicle->setIsCompanyOwned($this->args['is_company_owned']);
        $vehicle->setWasAdded($this->args['was_added']);
        //var_dump($vehicle);exit;

        $this->assertEquals($this->args['vtype'], $vehicle->getVtype());
        $this->assertEquals($this->args['make'], $vehicle->getMake());
        $this->assertEquals($this->args['model'], $vehicle->getModel());
        $this->assertEquals($this->args['reg_no'], $vehicle->getRegNo());
        $this->assertEquals($this->args['passengers'], $vehicle->getPassengers());
        $this->assertEquals($this->args['is_company_owned'], $vehicle->getIsCompanyOwned());
        $this->assertEquals($this->args['was_added'], $vehicle->getWasAdded());
    }

}
