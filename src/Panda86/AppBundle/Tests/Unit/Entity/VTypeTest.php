<?php

namespace Panda86\AppBundle\Tests\Unit\Entity;

use Panda86\AppBundle\Entity\Vehicle;
use Panda86\AppBundle\Entity\VType;
use Symfony\Component\Config\Definition\Exception\Exception;

class VTypeTest extends \PHPUnit_Framework_TestCase {

    private $args = array();

    public function setUp()
    {
        $vehicle_args = array(
            'make' => 'Toyota',
            'model' => 'Corolla',
            'reg_no' => 'WP NZB-5465',
            'passengers' => 4,
            'was_added' => new \DateTime('-10 months'),
        );
        $this->args = array(
            'name' => '4-passenger-sedan',
            'descrip' => 'Standard car with four passenger seats',
            'vehicle_car' => new Vehicle($vehicle_args)
        );
    }
    
    public function testCanCreateVType()
    {
        $vtype =  new VType();
        $this->assertInstanceOf('Panda86\AppBundle\Entity\VType', $vtype);
        return $vtype;
    }

    /**
     * 
     * @depends testCanCreateVType
     */
    public function testCanReadAttribs(VType $vtype)
    {
        $vtype->setName($this->args['name']);
        $vtype->setDescrip($this->args['descrip']);

        $this->assertEquals($this->args['name'], $vtype->getName());
        $this->assertEquals($this->args['descrip'], $vtype->getDescrip());

        return $vtype;
    }

    /**
     * @depends testCanReadAttribs
     */
    public function testCanAddVehicle(VType $vtype)
    {

        $vtype->getVehicles()->add($this->args['vehicle_car']);
        $this->assertCount(1, $vtype->getVehicles());

        return $vtype;
    }

    /**
     * @depends testCanAddVehicle
     */
    public function testCanRemoveVehicle(VType $vtype)
    {
        $result = $vtype->getVehicles();
        $vtype->removeVehicle($result[0]);
        $this->assertCount(0, $vtype->getVehicles());
    }

}
