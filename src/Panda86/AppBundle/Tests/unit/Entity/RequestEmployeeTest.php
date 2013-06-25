<?php

namespace Panda86\AppBundle\Tests\Entity;

use Panda86\AppBundle\Entity\Employee;
use Panda86\AppBundle\Entity\Request;
use Panda86\AppBundle\Entity\VType;
use Panda86\AppBundle\Entity\RequestEmployee;
use Symfony\Component\Config\Definition\Exception\Exception;

class RequestEmployeeTest extends \PHPUnit_Framework_TestCase {

    private $emp_args = array();
    private $req_args = array();

    public function setUp()
    {
        $this->emp_args = array(
            'employee1' => new Employee(array(
                'name' => 'John Doe'
            ))
        );
        $this->req_args = array(
            'requested_for' => 'Mr. Employee',
            'journey_type' => 'single',
            'vtype' => new VType(array(
                'name' => '4-passenger-sedan',
                'descrip' => 'Standard car with four passenger seats'
            )),
            'purpose' => 'Official',
            'accompanied_by' => 'Mr. Employee B'
        );
    }

    public function testCanCreateRequestEmployee()
    {
        $requestEmployee = new RequestEmployee();
        $this->assertInstanceOf('Panda86\AppBundle\Entity\RequestEmployee', $requestEmployee);

        return $requestEmployee;
    }

    /**
     * @depends testCanCreateRequestEmployee
     */
    public function testCanSetAttribs(RequestEmployee $requestEmployee)
    {
        $request =  new Request($this->req_args);
        $employee = new Employee($this->emp_args);

        $requestEmployee->setIsOwner(true);
        $requestEmployee->setRequest($request);
        $requestEmployee->setEmployee($employee);

        $this->assertEquals($employee, $requestEmployee->getEmployee());
        $this->assertEquals($request, $requestEmployee->getRequest());
        $this->assertTrue($requestEmployee->getIsOwner());

    }

}
