<?php

namespace Panda86\AppBundle\Tests\Unit\Entity;

use Panda86\AppBundle\Entity\Vehicle;
use Panda86\AppBundle\Entity\VType;
use Symfony\Component\Config\Definition\Exception\Exception;

class VTypeTest extends \PHPUnit_Framework_TestCase {

    private $args = array();

    public function setUp()
    {
        $this->args = array(
            'name' => '4-passenger-sedan',
            'descrip' => 'Standard car with four passenger seats',
            'vehicle1' => new Vehicle(array(
              'make' => 'Toyota',
              'model' => 'Corolla',
              'reg_no' => 'WP NZB-5465',
              'passengers' => 4,
              'is_company_owned' => true,
              'was_added' => strtotime("+1 week 2 days 4 hours 2 seconds"))
            )
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
    public function testCanGetAttribs(VType $vtype)
    {
        $vtype->setName($this->args['name']);
        $vtype->setDescrip($this->args['descrip']);

        $this->assertEquals($this->args['name'], $vtype->getName());
        $this->assertEquals($this->args['descrip'], $vtype->getDescrip());

        return $vtype;
    }

    /**
     * @depends testCanGetAttribs
     */
    public function testCanAddVehicle(VType $vtype)
    {

        $vtype->getVehicles()->add($this->args['vehicle1']);
        $this->assertCount(1, $vtype->getVehicles());

        return $vtype;
    }

    /**
     * @depends testCanAddVehicle
     */
    public function testCanRemoveVehicle(VType $vtype)
    {
        //var_dump($vtype->getVehicles()[0]);exit;
        $vtype->removeVehicle($vtype->getVehicles()[0]);
        $this->assertCount(0, $vtype->getVehicles());
    }
}
