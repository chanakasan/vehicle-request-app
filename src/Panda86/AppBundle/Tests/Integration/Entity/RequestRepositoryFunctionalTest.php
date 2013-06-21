<?php

namespace Panda86\AppBundle\Tests\Entity;
use Panda86\AppBundle\Tests\Integration\Ke;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RequestRepositoryFunctionalTest extends WebTestCase
{
    /**
    * @var \Doctrine\ORM\EntityManager
    */
    private $em;

    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        static::$kernel = static::createKernel();
        static::$kernel->boot();
        $this->em = static::$kernel->getContainer()
            ->get('doctrine')
            ->getManager()
        ;
    }

    public function testFindById()
    {
        $results = $this->em
            ->getRepository('Panda86AppBundle:Request')
            ->findAll()
        ;
        $this->assertCount(1, $results);
    }

    /**
     * {@inheritDoc}
     */
    protected function tearDown()
    {
        parent::tearDown();
        $this->em->close();
    }
}