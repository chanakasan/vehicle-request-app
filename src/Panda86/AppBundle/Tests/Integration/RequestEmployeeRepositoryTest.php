<?php

namespace Panda86\AppBundle\Tests\Integration;

use Panda86\AppBundle\Tests\FunctionalTestCase;
use Panda86\AppBundle\Entity\VType;
use Panda86\AppBundle\Entity\RequestEmployee;
use Panda86\AppBundle\Entity\Request;
use Panda86\AppBundle\Entity\Employee;

class RequestEmployeeTest extends FunctionalTestCase
{
    private $repo;
    
    public function setUp()
    {
        parent::setUp();
        
        $this->repo = $this->em->getRepository('Panda86AppBundle:RequestEmployee');        
    }
    
    public function testCanGetList()
    {
        $result = $this->repo->getList();

        foreach($result as $row)
        {
            $this->assertInternalType('int', $row['request']->getId());
            $this->assertInternalType('string', $row['owner']->getName());

            foreach($row['otherPassengers'] as $passenger)
            {
                $this->assertInternalType('string', $passenger->getName());
            }
        }
    }    
    
}