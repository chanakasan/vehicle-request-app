<?php

namespace Panda86\AppBundle\Tests\Integration;

class FunctionalTestCase extends \PHPUnit_Framework_TestCase
{
    /**
    * @var \Doctrine\ORM\EntityManager
    */
    protected $em;

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
    protected function getMetadatas()
    {
        return $this->em->getMetadataFactory()->getAllMetadata();
    }

    protected function tearDown()
    {
        $this->em->close();
    }
}