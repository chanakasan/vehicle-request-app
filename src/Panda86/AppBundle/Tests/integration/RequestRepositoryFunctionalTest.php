<?php

namespace Panda86\AppBundle\Tests\Integration;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RequestRepositoryFunctionalTest extends WebTestCase
{
    /**
    * @var \Doctrine\ORM\EntityManager
    */
    private $em;

    public static function setUpBeforeClass()
    {

    }

    public function setUp()
    {
        static::$kernel = static::createKernel();
        static::$kernel->boot();
        $this->em = static::$kernel->getContainer()
            ->get('doctrine')
            ->getManager()
        ;

        $this->generateSchema();
    }

    public function testFindById()
    {
        $results = $this->em
            ->getRepository('Panda86AppBundle:Request')
            ->findAll()
        ;
        $this->assertCount(0, $results);
    }
    /**
     * @return null
     */
    protected function generateSchema()
    {
        $metadatas = $this->getMetadatas();

        if (!empty($metadatas)) {
            $tool = new \Doctrine\ORM\Tools\SchemaTool($this->em);
            $tool->dropSchema($metadatas);
            $tool->createSchema($metadatas);
        }
    }

    /**
     * @return array
     */
    protected function getMetadatas() {
        return $this->em->getMetadataFactory()->getAllMetadata();
    }

    protected function tearDown()
    {
        parent::tearDown();
        $this->em->close();
    }
}