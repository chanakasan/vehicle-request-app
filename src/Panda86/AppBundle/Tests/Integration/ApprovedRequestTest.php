<?php

namespace Panda86\AppBundle\Tests\Integration;

use Panda86\AppBundle\Tests\FunctionalTestCase;
use Panda86\AppBundle\Entity\ApprovedRequest;
use Panda86\AppBundle\Entity\Request;
use Panda86\AppBundle\Entity\VType;
use Panda86\AppBundle\Entity\Vehicle;
use Panda86\AppBundle\Entity\Driver;

class ApprovedRequestTest extends FunctionalTestCase
{
    private $requests;
    private $vehicles;
    private $drivers;

    public function setUp()
    {
        parent::setUp();

        $this->requests = $this->em->getRepository('Panda86AppBundle:Request')->findAll();
        $this->vehicles = $this->em->getRepository('Panda86AppBundle:Vehicle')->findAll();
        $this->drivers = $this->em->getRepository('Panda86AppBundle:Driver')->findAll();
    }

    public function testCanApproveRequest()
    {
        foreach($this->requests as $request)
        {
            $approved = new ApprovedRequest();
            $approved->setRequest($request);
            $approved->setVehicle($this->vehicles[0]);
            $approved->setDriver($this->drivers[0]);
            $approved->setRemarks("Pickup points: ICTA, Colombo");
            $this->em->persist($approved);
        }

        $this->em->flush();
        $this->assertInstanceOf('Panda86\AppBundle\Entity\ApprovedRequest', $approved);
    }

}