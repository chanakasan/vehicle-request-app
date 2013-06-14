<?php

namespace Panda86\UserBundle\Tests\Entity;
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
            ->getRepository('Panda86UserBundle:Request')
            ->findAll()
        ;

        $this->assertCount(0, $results);
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