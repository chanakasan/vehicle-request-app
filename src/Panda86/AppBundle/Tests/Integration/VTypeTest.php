<?php

namespace Panda86\AppBundle\Tests\Integration;

use Panda86\AppBundle\Tests\FunctionalTestCase;
use Panda86\AppBundle\Entity\VType;

class VTypeTest extends FunctionalTestCase
{
    protected $args = array();

    public function setUp()
    {
        parent::setUp();
    }

    public function  testCanSaveVType()
    {
        $vtype = new VType(array(
            'name' => '12-passenger-van',
            'descrip' => 'Standard car with four passenger seats'
        ));

        $this->em->persist($vtype);
        $this->em->flush();

        $this->assertInstanceOf('Panda86\AppBundle\Entity\VType', $vtype);
    }

}