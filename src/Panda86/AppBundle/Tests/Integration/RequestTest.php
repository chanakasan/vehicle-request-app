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
    }

    public function testCanSaveRequestEmployee()
    {
        $requestEmployee = new RequestEmployee();
        $request =  new Request($this->req_args);
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