<?php

namespace Panda86\AppBundle\Tests\Unit\Entity;

use Panda86\AppBundle\Entity\Employee;

class EmployeeTest extends \PHPUnit_Framework_TestCase
{
    private $args = array();

    public function setUp()
    {
            $this->args = array(
                'name' => 'John Doe'
            );
    }

    public function testCanCreateEmployee()
    {
        $employee = new Employee($this->args);
        $this->assertInstanceOf('Panda86\AppBundle\Entity\Employee', $employee);
    }

}