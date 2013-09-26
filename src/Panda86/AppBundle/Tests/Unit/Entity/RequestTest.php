<?php

namespace Panda86\AppBundle\Tests\Entity;

use Panda86\AppBundle\Entity\Employee;
use Panda86\AppBundle\Entity\Request;
use Panda86\AppBundle\Entity\VType;

class RequestTest extends \PHPUnit_Framework_TestCase {

    private $req1 = array();

    public function setUp()
    {
        $this->req1 = array(
            'journey_type' => 'single',
            'days' => 1,
            'pickup_loc' => 'ICTA',
            'start_time' =>  new \DateTime('2013-07-02 13:00:00'),
            'pickup_time' =>  new \DateTime('2013-07-02 14:00:00'),
            'destination' => 'colombo',
            'return_time' => new \DateTime('2013-07-02 16:00:00'),
            'vtype' => new VType(array(
                'name' => '4-passenger-sedan',
                'descrip' => 'Standard car with four passenger seats'
            )),
            'purpose' => 'Official',
            'created_at' => new \DateTime('now'),
            'updated_at' => new \DateTime('+5 minutes'),
        );
    }

    public function testCanCreateRequest()
    {
        $request =  new Request($this->req1);
        $this->assertInstanceOf('Panda86\AppBundle\Entity\Request', $request);
        return $request;
    }

    /**
     * @depends testCanCreateRequest
     */
    public function testCanReadAttribs(Request $request)
    {
        $this->assertEquals($this->req1['journey_type'], $request->getJourneyType());
        $this->assertEquals($this->req1['days'], $request->getDays());
        $this->assertEquals($this->req1['pickup_loc'], $request->getPickupLoc());
        $this->assertEquals($this->req1['start_time'], $request->getStartTime());
        $this->assertEquals($this->req1['pickup_time'], $request->getPickupTime());
        $this->assertEquals($this->req1['destination'], $request->getDestination());
        $this->assertEquals($this->req1['destination'], $request->getDestination());
        $this->assertEquals($this->req1['vtype'], $request->getVtype());
        $this->assertEquals($this->req1['purpose'], $request->getPurpose());
        $this->assertEquals($this->req1['created_at'], $request->getCreatedAt());
        $this->assertEquals($this->req1['updated_at'], $request->getUpdatedAt());
    }

    /**
     * @depends testCanCreateRequest
     */
    public function testHasPendingStatus(Request $request)
    {
        $this->assertEquals(0, $request->getStatus());
    }

    /**
     * @depends testCanCreateRequest
     */
    public function testCanSetStatus(Request $request)
    {
        $request->setStatus(1);
        $this->assertEquals(1, $request->getStatus());

        $request->setStatus(2);
        $this->assertEquals(2, $request->getStatus());
    }
    
    /**
     * @depends testCanCreateRequest
     * @expectedException InvalidArgumentException
     */
    public function testInvalidStatus(Request $request)
    {
        $request->setStatus('AnInvalidStatus');
    }

    /**
     * @depends testCanCreateRequest
     * @expectedException InvalidArgumentException
     */
    public function testInvalidJourneyType(Request $request)
    {
        $request->setJourneyType('AnInvalidJourneyType');
    }

    /**
     * @depends testCanCreateRequest
     */
    public function testCanSetRequester(Request $request)
    {
        $john_doe = new Employee(array(
            'name' => 'John Doe',
            'email' => 'john@doe.com',
        ));
        $request->setRequester($john_doe);
        $this->assertInstanceOf('Panda86\AppBundle\Entity\Employee', $request->getRequester());
    }

    /**
     * @depends testCanCreateRequest
     */
    public function testCanAddOtherPassengers(Request $request)
    {
        $john_doe = new Employee(array(
            'name' => 'John Doe',
            'email' => 'john@doe.com',
        ));
        $martin_doe = new Employee(array(
            'name' => 'Martin Doe',
            'email' => 'john@doe.com',
        ));
        $request->addAccompaniedBy($john_doe);
        $request->addAccompaniedBy($martin_doe);
        $otherPassengers = $request->getAccompaniedBy();

        $this->assertEquals('John Doe', $otherPassengers[0]->getName());
        $this->assertEquals('Martin Doe', $otherPassengers[1]->getName());
    }
}
