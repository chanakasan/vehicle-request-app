<?php

namespace Panda86\AppBundle\Tests\Entity;

use Panda86\AppBundle\Entity\Request;
use Symfony\Component\Config\Definition\Exception\Exception;

class RequestTest extends \PHPUnit_Framework_TestCase {

    private $args = array();

    public function setUp()
    {
        $this->args = array(
            'requested_for' => 'Mr. Employee',
            'journey_type' => 'single',
            'start_time' => new \DateTime('now'),
            'start_loc' => 'ICTA',
            'pickup_time' => new \DateTime('+60 minutes'),
            'pickup_loc' => 'Colombo 10',
            'end_time' => new \DateTime('+180 minutes'),
            'end_loc' => 'ICTA',
            'vehicle_type' => 'car',
            'purpose' => 'Official',
            'acoompanied_by' => 'Mr. Employee B',
            'created_at' => new \DateTime('now'),
        );
    }

    public function testCanCreateRequest()
    {
        $request =  new Request($this->args);
        $this->assertInstanceOf('Panda86\AppBundle\Entity\Request', $request);
        return $request;
    }

    /**
     * @depends testCanCreateRequest
     */
    public function testCanSRequest($request)
    {
        $this->assertEquals($this->args['requested_for'], $request->getRequestedFor());
        $this->assertEquals($this->args['journey_type'], $request->getJourneyType());
        $this->assertEquals($this->args['start_time'], $request->getStartTime());
        $this->assertEquals($this->args['start_loc'], $request->getStartLoc());
        $this->assertEquals($this->args['pickup_time'], $request->getPickupTime());
        $this->assertEquals($this->args['pickup_loc'], $request->getPickupLoc());

    }


}
