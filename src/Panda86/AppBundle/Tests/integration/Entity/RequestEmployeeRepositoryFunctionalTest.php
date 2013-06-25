<?php

namespace Panda86\AppBundle\Tests\Integration\Entity;

use Panda86\AppBundle\Entity\Employee;
use Panda86\AppBundle\Entity\Request;
use Panda86\AppBundle\Entity\RequestEmployee;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RequestEmployeeRepositoryFunctionalTest extends WebTestCase
{
    
    /**
    * @var \Doctrine\ORM\EntityManager
    */
    private $em;
    
    /**
    * @var \Doctrine\ORM\Tools\SchemaTool
    */
    private $tool;

    private $args = array();

    public function setUp()
    {
        $this->args = array(
            'requested_for' => 'Mr. Employee',
            'journey_type' => 'single',
            'start_time' => new \DateTime('now'),
            'start_loc' => 'ICTA',
            'pickup_time' => new \DateTime('+60 minutes'),
            'pickup_loc' => 'Colombo 10',
            'end_time' => new \DateTime('+180 minutes'),
            'end_loc' => 'ICTA',
            'vehicle_type' => 'car',
            'purpose' => 'Official',
            'acoompanied_by' => 'Mr. Employee B',
            'created_at' => new \DateTime('now'),
        );

        static::$kernel = static::createKernel();
        static::$kernel->boot();
        $this->em = static::$kernel->getContainer()
            ->get('doctrine')
            ->getManager()
        ;
    }

    public function testCanSaveRequestEmployee()
    {
        $request =  new Request($this->args);

        $employee1 = new Employee();
        $employee1->setName('Mr. John');
        $employee1->addRequest($request);

        $employee2 = new Employee();
        $employee2->setName('Mr. John2');
        $employee2->addRequest($request);

        $requestEmployee1 = new RequestEmployee();
        $requestEmployee1->setIsOwner(true);
        $requestEmployee1->setRequest($request);
        $requestEmployee1->setEmployee($employee1);
        
        $requestEmployee2 = new RequestEmployee();
        $requestEmployee2->setIsOwner(false);
        $requestEmployee2->setRequest($request);
        $requestEmployee2->setEmployee($employee2);

        $this->em->persist($request);
        $this->em->persist($employee1);
        $this->em->persist($employee2);
        $this->em->persist($requestEmployee1);
        $this->em->persist($requestEmployee2);

        $this->em->flush();
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