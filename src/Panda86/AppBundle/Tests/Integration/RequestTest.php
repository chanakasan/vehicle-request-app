<?php

namespace Panda86\AppBundle\Tests\Integration;

use Panda86\AppBundle\Tests\FunctionalTestCase;

use Panda86\AppBundle\Entity\Request;
use Panda86\AppBundle\Entity\Employee;

class RequestTest extends FunctionalTestCase
{
    public $req;

    public function setUp()
    {
        parent::setUp();

        $this->req = array(
            'journey_type' => 'single',
            'days' => 1,
            'pickup_loc' => 'ICTA',
            'start_time' =>  new \DateTime('2013-07-02 13:00:00'),
            'pickup_time' =>  new \DateTime('2013-07-02 14:00:00'),
            'destination' => 'colombo',
            'return_time' => new \DateTime('2013-07-02 16:00:00'),
            'purpose' => 'Official',
            'created_at' => new \DateTime('2013-07-01 12:00:00'),
            'updated_at' => new \DateTime('now'),
        );
    }

    public function testCanSaveRequests()
    {
        $employees =  $this->em->getRepository('Panda86AppBundle:Employee')->findAll();
        $vtypes =  $this->em->getRepository('Panda86AppBundle:VType')->findAll();

        $request =  new Request($this->req);
        $request->setVType($vtypes[0]);
        $request->setRequester($employees[99]);

        $req_with_passengers =  new Request($this->req);
        $req_with_passengers->setVType($vtypes[0]);
        $req_with_passengers->setRequester($employees[120]);
        $req_with_passengers->addAccompaniedBy($employees[101]);
        $req_with_passengers->addAccompaniedBy($employees[102]);

        $this->em->persist($request);
        $this->em->persist($req_with_passengers);

        $this->em->flush();
        $this->assertInstanceOf('Panda86\AppBundle\Entity\Request', $request);
    }
}