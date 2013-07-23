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
    private $request;
    private $vehicle;
    private $driver;

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
            'purpose' => 'Official',
            'created_at' => new \DateTime('2013-07-01 12:00:00'),
            'updated_at' => new \DateTime('now'),
        );

        $vehicle1 = array(
            'make' => 'Toyota',
            'model' => 'Corolla',
            'reg_no' => 'WP NZB-5465',
            'passengers' => 4,
            'is_company_owned' => true,
        );

        $driver1 = array(
            'first_name' => 'John',
            'last_name' => 'Doe',
            'display_name' => 'John Doe',
            'birth_date' => new \DateTime('1980-01-01'),
            'license_date' => new \DateTime('2008-07-01'),
            'license_ref' => 'WP14124519V',
            'address' => '456/B, New Strret, New Town',
            'mobile' => 94777123456,
            'created' => new \DateTime('now')
        );

        $vtypes =  $this->em->getRepository('Panda86AppBundle:VType')->findAll();
        $vtype = $vtypes[0];

        $this->request = new Request($req1);
        $this->request->setVtype($vtype);
        $this->vehicle = new Vehicle($vehicle1);
        $this->vehicle->setVtype($vtype);
        $this->driver = new Driver($driver1);

        $this->em->persist($this->request);
        $this->em->persist($this->driver);
        $this->em->persist($this->vehicle);
    }

    public function testCanSaveApprovedRequest()
    {
        $approved = new ApprovedRequest();

        $approved->setRequest($this->request);
        $approved->setVehicle($this->vehicle);
        $approved->setDriver($this->driver);
        $approved->setRemarks("Pickup points: ICTA, Colombo");

        $this->em->persist($approved);
        $this->em->flush();

        $this->assertInstanceOf('Panda86\AppBundle\Entity\ApprovedRequest', $approved);
    }

}