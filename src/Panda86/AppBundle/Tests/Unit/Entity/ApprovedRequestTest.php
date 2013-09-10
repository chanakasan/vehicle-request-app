<?php

namespace Panda86\AppBundle\Tests\Unit\Entity;

use Panda86\AppBundle\Entity\ApprovedRequest;
use Panda86\AppBundle\Entity\Request;
use Panda86\AppBundle\Entity\VType;
use Panda86\AppBundle\Entity\Vehicle;
use Panda86\AppBundle\Entity\Driver;

class ApprovedRequestTest extends \PHPUnit_Framework_TestCase
{
    private $request;
    private $vehicle;
    private $driver;

    public function setUp()
    {
        $req1 = array(
            'journey_type' => 'single',
            'days' => 1,
            'pickup_loc' => 'ICTA',
            'destination' => 'Colombo 1',
            'pickup_time' =>  new \DateTime('2013-07-02 13:00:00'),
            'return_time' => new \DateTime('2013-07-02 16:00:00'),
            'vtype' => new VType(array(
                'name' => '4-passenger-sedan',
                'descrip' => 'Standard car with four passenger seats'
            )),
            'purpose' => 'Meeting'
        );

        $vehicle1 = array(
            'vtype' => new VType(array(
                'name' => '4-passenger-sedan',
                'descrip' => 'Standard car with four passenger seats'
            )),
            'make' => 'Toyota',
            'model' => 'Corolla',
            'reg_no' => 'WP NZB-5465',
            'passengers' => 4,
            'is_company_owned' => true,
            'was_added' => new \DateTime('2012-01-01 13:00:00'),
        );

        $driver1 = array(
            'first_name' => 'John',
            'last_name' => 'Doe',
            'display_name' => 'John Doe',
            'birth_date' => date('Y-m-d', strtotime('January 18, 1989')),
            'license_date' => date('Y-m-d', strtotime('January 20, 2005')),
            'license_ref' => 'WP14124519V',
            'address' => '456/B, New Strret, New Town',
            'mobile' => 94777123456,
            'created' => new \DateTime('2010-01-01 13:00:00'),
        );

        $this->request = new Request($req1);
        $this->vehicle = new Vehicle($vehicle1);
        $this->driver = new Driver($driver1);
    }

    public function testCanCreateApprovedRequest()
    {
        $approved = new ApprovedRequest();

        $approved->setRequest($this->request);
        $approved->setVehicle($this->vehicle);
        $approved->setDriver($this->driver);

        $this->assertInstanceOf('Panda86\AppBundle\Entity\ApprovedRequest', $approved);
        return $approved;
    }

    /**
     * @depends testCanCreateApprovedRequest
     */
    public function testCanReadAttributes($approved)
    {
        $this->assertInstanceOf('Panda86\AppBundle\Entity\Request', $approved->getRequest());
        $this->assertEquals($this->vehicle, $approved->getVehicle());
        $this->assertEquals($this->driver, $approved->getDriver());

    }

    /**
     * @depends testCanCreateApprovedRequest
     */
    public function testCanAutoUpdateStatus($approved)
    {
        $this->assertEquals(1, $approved->getRequest()->getStatus());
    }

}