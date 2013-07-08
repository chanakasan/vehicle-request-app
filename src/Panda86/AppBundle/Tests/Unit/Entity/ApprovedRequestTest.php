<?php

namespace Panda86\AppBundle\Tests\Unit\Entity;

use Panda86\AppBundle\Entity\ApprovedRequest;
use Panda86\AppBundle\Entity\Request;
use Panda86\AppBundle\Entity\VType;
use Panda86\AppBundle\Entity\Vehicle;
use Panda86\AppBundle\Entity\Driver;

class ApprovedRequestTest extends \PHPUnit_Framework_TestCase
{
    private $req1 = array();
    private $vehicle = array();
    private $driver = array();

    public function setUp()
    {
        $req1 = array(
            'journey_type' => 'single',
            'days' => 1,
            'pickup_loc' => 'ICTA',
            'pickup_time' =>  strtotime("+1 week 2 days 4 hours 2 seconds"),
            'destination' => 'colombo',
            'return_time' => strtotime("+1 week 2 days 6 hours 2 seconds"),
            'vtype' => new VType(array(
                'name' => '4-passenger-sedan',
                'descrip' => 'Standard car with four passenger seats'
            )),
            'purpose' => 'Official',
            'created_at' => new \DateTime('now'),
            'updated_at' => strtotime("+10 minutes"),
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
            'was_added' => strtotime("+1 week 2 days 4 hours 2 seconds")
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
            'created' => strtotime("+1 day 4 hours 2 seconds")
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
    public function testCanSetAttributes($approved)
    {
        $this->assertEquals($this->request, $approved->getRequest());
        $this->assertEquals($this->vehicle, $approved->getVehicle());
        $this->assertEquals($this->driver, $approved->getDriver());

    }

}