<?php

namespace Panda86\AppBundle\Tests\Entity;

use Panda86\AppBundle\Entity\Request;
use Panda86\AppBundle\Entity\VType;
use Symfony\Component\Config\Definition\Exception\Exception;

class RequestTest extends \PHPUnit_Framework_TestCase {

    private $req1 = array();
    private $req2 = array();
    private $req3 = array();
    private $req4 = array();

    public function setUp()
    {
        $this->req1 = array(
            'journey_type' => 'OneDay-Single',
            'days' => null,
            'pickup_loc' => 'ICTA',
            'pickup_time' =>  strtotime("+1 week 2 days 4 hours 2 seconds"),
            'destination' => 'colombo',
            'vtype' => new VType(array(
                'name' => '4-passenger-sedan',
                'descrip' => 'Standard car with four passenger seats'
            )),
            'purpose' => 'Official',
            'created_at' => new \DateTime('now'),
            'updated_at' => strtotime("+10 minutes"),
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
    public function testCanSetAttribs(Request $request)
    {
        $request->setOptions($this->req1);
        //var_dump($request);exit;

        $this->assertEquals($this->req1['journey_type'], $request->getJourneyType());
        $this->assertEquals($this->req1['days'], $request->getDays());
        $this->assertEquals($this->req1['pickup_loc'], $request->getPickupLoc());
        $this->assertEquals($this->req1['pickup_time'], $request->getPickupTime());
        $this->assertEquals($this->req1['destination'], $request->getDestination());
        $this->assertEquals($this->req1['vtype'], $request->getVtype());
        $this->assertEquals($this->req1['purpose'], $request->getPurpose());
        $this->assertEquals($this->req1['created_at'], $request->getCreatedAt());
        $this->assertEquals($this->req1['updated_at'], $request->getUpdatedAt());

    }


}
