<?php

namespace Panda86\AppBundle\Tests\Integration;

use Panda86\AppBundle\Tests\FunctionalTestCase;
use Panda86\AppBundle\Entity\DisapprovedRequest;
use Panda86\AppBundle\Entity\Request;
use Panda86\AppBundle\Entity\VType;

class DisapprovedRequestTest extends FunctionalTestCase
{
    private $request;

    public function setUp()
    {
        parent::setUp();

        $req1 = array(
            'journey_type' => 'single',
            'days' => 1,
            'pickup_loc' => 'ICTA',
            'pickup_time' =>  new \DateTime('2013-07-02 14:00:00'),
            'destination' => 'colombo',
            'return_time' => new \DateTime('2013-07-02 16:00:00'),
            'vtype' => new VType(array(
                'name' => '4-passenger-sedan',
                'descrip' => 'Standard car with four passenger seats'
            )),
            'purpose' => 'Official',
            'created_at' => new \DateTime('2013-07-01 12:00:00'),
            'updated_at' => new \DateTime('now'),
        );

        $vtypes =  $this->em->getRepository('Panda86AppBundle:VType')->findAll();

        $this->request = new Request($req1);
        $this->request->setVtype($vtypes[0]);

        $this->em->persist($this->request);
    }

    public function testCanSaveDisapprovedRequest()
    {
        $disapproved = new DisapprovedRequest();

        $disapproved->setRequest($this->request);
        $disapproved->setRemarks("Disapproved due to unavailability of vehicles.");

        $this->em->persist($disapproved);
        $this->em->flush();

        $this->assertInstanceOf('Panda86\AppBundle\Entity\DisapprovedRequest', $disapproved);
    }

}