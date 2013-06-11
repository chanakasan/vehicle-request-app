<?php

namespace Panda86\UserBundle\Tests\Entity;

use Panda86\UserBundle\Entity\Request;
use Symfony\Component\Config\Definition\Exception\Exception;

class RequestTest extends \PHPUnit_Framework_TestCase {

    public function testCanCreateRequest()
    {
        $args = array(
            'requested_for' => 'EMPLOYEE',
            'journey_type' => 'SINGLE',
            'start_time' => new \DateTime('now'),
            'end_time' => new \DateTime('+30 minutes'),

        );
        $request = new Request($args);
        $this->assertEquals('EMPLOYEE', $request->getRequestedFor());
        var_dump($request);exit;
    }

    public function testCanSaveRequest()
    {
        $args = array(
            'requested_for' => 'EMPLOYEE',
            'journey_type' => 'SINGLE',
            'start_time' => new \DateTime('now'),
            'end_time' => new \DateTime('+30 minutes'),

        );
        $request = new Request($args);

    }

}
