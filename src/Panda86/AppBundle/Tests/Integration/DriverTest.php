<?php

namespace Panda86\AppBundle\Tests\Integration;

use Panda86\AppBundle\Tests\FunctionalTestCase;
use Panda86\AppBundle\Entity\Driver;

class DriverTest extends FunctionalTestCase
{
    protected $args = array();

    public function setUp()
    {
        parent::setUp();

        $this->args = array(
            'first_name' => 'John',
            'last_name' => 'Doe',
            'display_name' => 'John Doe',
            'birth_date' => new \DateTime('1980-01-01'),
            'license_date' => new \DateTime('2008-07-01'),
            'license_ref' => 'WP14124519V',
            'address' => '456/B, New Strret, New Town',
            'mobile' => 94777123456,
            'created' => new \DateTime('now')
        );
    }

    public function  testCanSaveDriver()
    {
        $driver =  new Driver($this->args);
        
        $this->em->persist($driver);
        $this->em->flush();

        $this->assertInstanceOf('Panda86\AppBundle\Entity\Driver', $driver);
    }

}