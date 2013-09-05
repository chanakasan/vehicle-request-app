<?php

namespace Panda86\AppBundle\Tests\Unit\Entity;

use Panda86\AppBundle\Entity\Employee;

class EmployeeTest extends \PHPUnit_Framework_TestCase
{
    private $args = array(
        'name' => 'John Doe',
        'email' => 'my-email@example.com'
    );

    public function setUp()
    {
    }

    public function testCanCreateEmployee()
    {
        $employee = new Employee($this->args);
        $this->assertInstanceOf('Panda86\AppBundle\Entity\Employee', $employee);

        return $employee;
    }

    /**
     * @depends testCanCreateEmployee
     */
    public function testCanReadAttribs(Employee $employee)
    {
        $this->assertEquals($this->args['name'], $employee->getName());
        $this->assertEquals($this->args['email'], $employee->getEmail());
    }

}