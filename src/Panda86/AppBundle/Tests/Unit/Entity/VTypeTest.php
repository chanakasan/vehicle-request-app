<?php

namespace Panda86\AppBundle\Tests\Unit\Entity;

use Panda86\AppBundle\Entity\VType;
use Symfony\Component\Config\Definition\Exception\Exception;

class VTypeTest extends \PHPUnit_Framework_TestCase {

    private $args = array();

    public function setUp()
    {
        $this->args = array(
          'name' => '4-passenger-sedan'
        );
    }
    
    public function testCanCreateVType()
    {
        $vtype =  new VType();
        $this->assertInstanceOf('Panda86\AppBundle\Entity\VType', $vtype);
    }
    
    public function testCanSetAttribs()
    {
        $vtype = new VType();
        $vtype->setName($this->args['name']);
        return $vtype;
    }
    /**
     * 
     * @depends testCanSetAttribs
     */
    public function testCanGetAttribs(VType $vtype)
    {
        $this->assertEquals($this->args['name'], $vtype->getName());
    }

}
