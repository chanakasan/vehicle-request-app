<?php

namespace Panda86\AppBundle\Tests\Entity;

use Panda86\AppBundle\Entity\Employee;
use Panda86\AppBundle\Entity\Request;
use Panda86\AppBundle\Entity\RequestEmployee;
use Symfony\Component\Config\Definition\Exception\Exception;

class RequestEmployeeTest extends \PHPUnit_Framework_TestCase {

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

    public function testCanCreateRequestEmployee()
    {
        $request =  new Request($this->args);

        $employee = new Employee();
        $employee->setName('Mr. John');
        $employee->addRequest($request);

        $requestEmployee = new RequestEmployee();
        $requestEmployee->getIsOwner(true);
        $requestEmployee->setRequest($request);
        $requestEmployee->setEmployee($employee);

        $this->assertInstanceOf('Panda86\AppBundle\Entity\RequestEmployee', $requestEmployee);
    }

}
