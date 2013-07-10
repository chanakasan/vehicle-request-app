<?php

namespace Panda86\AppBundle\Tests\Integration;

use Panda86\AppBundle\Tests\FunctionalTestCase;
use Panda86\AppBundle\Entity\Vehicle;
use Panda86\AppBundle\Entity\VType;

class VehicleTest extends FunctionalTestCase
{
    protected $args = array();

    public function setUp()
    {
        parent::setUp();

        $this->args = array(
            'make' => 'Toyota',
            'model' => 'Corolla',
            'reg_no' => 'WP NZB-5465',
            'passengers' => 4,
            'is_company_owned' => true,
            'was_added' => new \DateTime('now')
        );
    }

    public function  testCanSaveVehicle()
    {
        $vehicle =  new Vehicle($this->args);
        $vtype = new VType(array(
            'name' => '7-passenger-mini-van',
            'descrip' => 'Standard car with four passenger seats'
        ));
        $vehicle->setVtype($vtype);

        $this->em->persist($vehicle);
        $this->em->persist($vtype);
        $this->em->flush();

        $this->assertInstanceOf('Panda86\AppBundle\Entity\Vehicle', $vehicle);
    }

}