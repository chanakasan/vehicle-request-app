<?php

namespace Panda86\AppBundle\Tests\Integration;

use Panda86\AppBundle\Tests\FunctionalTestCase;
use Panda86\AppBundle\Entity\VType;
use Panda86\AppBundle\Entity\RequestEmployee;
use Panda86\AppBundle\Entity\Request;
use Panda86\AppBundle\Entity\Employee;

class RequestTest extends FunctionalTestCase
{
    public function setUp()
    {
        parent::setUp();

        $this->emp_args = array(
            'name' => 'John Doe'
        );
        $this->req_args = array(
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

    public function testCanSaveRequestEmployee()
    {
        $vtypes =  $this->em->getRepository('Panda86AppBundle:VType')->findAll();

        $requestEmployee = new RequestEmployee();

        $request =  new Request($this->req_args);
        $request->setVType($vtypes[0]);
        $employee = new Employee($this->emp_args);

        $requestEmployee->setIsOwner(true);
        $requestEmployee->setRequest($request);
        $requestEmployee->setEmployee($employee);

        $this->em->persist($request);
        $this->em->persist($employee);
        $this->em->persist($requestEmployee);

        $this->em->flush();
        $this->assertInstanceOf('Panda86\AppBundle\Entity\RequestEmployee', $requestEmployee);
    }
}