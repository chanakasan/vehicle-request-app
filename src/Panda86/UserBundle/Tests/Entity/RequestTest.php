<?php

namespace Panda86\UserBundle\Tests\Entity;

use Panda86\UserBundle\Entity\Request;

class RequestTest extends \PHPUnit_Framework_TestCase {

    public function testCreateRequest()
    {
        $args = array(
          'requested_for' => 'EMPLOYEE',
          'journey_type' => 'SINGLE',
          'start_time' => new \DateTime('now'),

        );
        $request = new Request($args);
        $this->assertEquals('EMPLOYEE', $request->getRequestedFor());
        //var_dump($request);exit;
    }
}