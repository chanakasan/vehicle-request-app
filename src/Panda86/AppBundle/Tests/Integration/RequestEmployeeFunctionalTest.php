<?php

namespace Panda86\AppBundle\Tests\Integration;

use Panda86\AppBundle\Tests\Integration\KernelAwareTestCase;

class RequestEmployeeFunctionalTest extends KernelAwareTestCase
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

        $this->assertInstanceOf('Panda86\AppBundle\Entity\RequestEmployee', $requestEmployee);
    }




}