<?php

namespace Panda86\AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Panda86\AppBundle\Entity\RequestEmployee;
use Panda86\AppBundle\Entity\Request;
use Panda86\AppBundle\Entity\Employee;

class LoadRequestEmployeeData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $requests = $manager->getRepository('Panda86AppBundle:Request')->findAll();

        $req1 = $requests[0];
        $req2 = $requests[1];
        $req3 = $requests[2];
        $req4 = $requests[3];
        $req5 = $requests[4];

        $emp = $manager->getRepository('Panda86AppBundle:Employee')->findAll();
        $emp1 = $emp[0];
        $emp2 = $emp[1];
        $emp3 = $emp[2];
        $emp4 = $emp[3];
        $emp5 = $emp[4];
        $emp6 = $emp[5];
        $emp7 = $emp[6];
        $emp8 = $emp[7];
        $emp9 = $emp[8];

        /* first request */
        // record one
        $reqEmp11 = new RequestEmployee();
        $reqEmp11->setRequest($req1);
        $reqEmp11->setEmployee($emp1);
        $reqEmp11->setIsOwner(true);

        $manager->persist($reqEmp11);

        // record two
        $reqEmp12 = new RequestEmployee();
        $reqEmp12->setRequest($req1);
        $reqEmp12->setEmployee($emp2);

        $manager->persist($reqEmp12);

        // record three
        $reqEmp13 = new RequestEmployee();
        $reqEmp13->setRequest($req1);
        $reqEmp13->setEmployee($emp3);

        $manager->persist($reqEmp13);

        /* second request */
        // record one
        $reqEmp21 = new RequestEmployee();
        $reqEmp21->setRequest($req2);
        $reqEmp21->setEmployee($emp2);
        $reqEmp21->setIsOwner(true);

        $manager->persist($reqEmp21);

        // record two
        $reqEmp22 = new RequestEmployee();
        $reqEmp22->setRequest($req2);
        $reqEmp22->setEmployee($emp5);

        $manager->persist($reqEmp22);

        /* third request */
        // record one
        $reqEmp31 = new RequestEmployee();
        $reqEmp31->setRequest($req3);
        $reqEmp31->setEmployee($emp8);
        $reqEmp31->setIsOwner(true);

        $manager->persist($reqEmp31);

        /* fourth request */
        // record one
        $reqEmp41 = new RequestEmployee();
        $reqEmp41->setRequest($req4);
        $reqEmp41->setEmployee($emp4);
        $reqEmp41->setIsOwner(true);

        $manager->persist($reqEmp41);

        // record two
        $reqEmp42 = new RequestEmployee();
        $reqEmp42->setRequest($req4);
        $reqEmp42->setEmployee($emp6);

        $manager->persist($reqEmp42);

        /* fifth request */
        // record one
        $reqEmp51 = new RequestEmployee();
        $reqEmp51->setRequest($req5);
        $reqEmp51->setEmployee($emp7);
        $reqEmp51->setIsOwner(true);

        $manager->persist($reqEmp51);

        // record two
        $reqEmp52 = new RequestEmployee();
        $reqEmp52->setRequest($req5);
        $reqEmp52->setEmployee($emp9);

        $manager->persist($reqEmp52);

        /* Add some extra pending requests */
        for($i=5; $i<7; $i++)
        {
            $reqEmp0 = new RequestEmployee();
            $reqEmp0->setRequest($requests[$i]);
            $reqEmp0->setEmployee($emp[$i+5]);
            $reqEmp0->setIsOwner(true);
            $manager->persist($reqEmp0);

            $reqEmp01 = new RequestEmployee();
            $reqEmp01->setRequest($requests[$i]);
            $reqEmp01->setEmployee($emp[$i+6]);
            $manager->persist($reqEmp01);

            $reqEmp01 = new RequestEmployee();
            $reqEmp01->setRequest($requests[$i]);
            $reqEmp01->setEmployee($emp[$i+7]);
            $manager->persist($reqEmp01);
        }

        /* Add some extra approved requests */
        for($i=7; $i<13; $i++)
        {
            $reqEmp0 = new RequestEmployee();
            $requests[$i]->setStatus(1); // approve
            $reqEmp0->setRequest($requests[$i]);
            $reqEmp0->setEmployee($emp[$i+5]);
            $reqEmp0->setIsOwner(true);
            $manager->persist($reqEmp0);

            $reqEmp01 = new RequestEmployee();
            $reqEmp01->setRequest($requests[$i]);
            $reqEmp01->setEmployee($emp[$i+6]);
            $manager->persist($reqEmp01);

            $reqEmp01 = new RequestEmployee();
            $reqEmp01->setRequest($requests[$i]);
            $reqEmp01->setEmployee($emp[$i+7]);
            $manager->persist($reqEmp01);
        }

        /* Add some extra disapproved requests */
        for($i=13; $i<15; $i++)
        {
            $reqEmp0 = new RequestEmployee();
            $requests[$i]->setStatus(2); // disapprove
            $reqEmp0->setRequest($requests[$i]);
            $reqEmp0->setEmployee($emp[$i+5]);
            $reqEmp0->setIsOwner(true);
            $manager->persist($reqEmp0);

            $reqEmp01 = new RequestEmployee();
            $reqEmp01->setRequest($requests[$i]);
            $reqEmp01->setEmployee($emp[$i+6]);
            $manager->persist($reqEmp01);

            $reqEmp01 = new RequestEmployee();
            $reqEmp01->setRequest($requests[$i]);
            $reqEmp01->setEmployee($emp[$i+7]);
            $manager->persist($reqEmp01);
        }

        $manager->flush();
    }

    /**
     * Get the order of this execution
     *
     * @return int
     */
    public function getOrder()
    {
        return 5;
    }

}