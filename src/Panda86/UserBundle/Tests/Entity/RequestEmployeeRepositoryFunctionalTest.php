<?php

namespace Panda86\UserBundle\Tests\Entity;

use Panda86\UserBundle\Entity\Employee;
use Panda86\UserBundle\Entity\Request;
use Panda86\UserBundle\Entity\RequestEmployee;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RequestEmployeeRepositoryFunctionalTest extends WebTestCase
{
    /**
    * @var \Doctrine\ORM\EntityManager
    */
    private $em;

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

        $requestEmployee = new RequestEmployee();
        $requestEmployee->setIsOwner(true);
        $requestEmployee->setRequest($request);
        $requestEmployee->setEmployee($employee1);

        $this->em->persist($request);
        $this->em->persist($employee);
        $this->em->persist($requestEmployee);

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