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
//        var_dump($requests);exit;
        $req1 = $requests[0];
        $req2 = $requests[1];
        $req3 = $requests[2];

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
        $reqEmp11->setIsOwner(true);
        $reqEmp11->setRequest($req1);
        $reqEmp11->setEmployee($emp1);

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
        $reqEmp21->setIsOwner(true);
        $reqEmp21->setRequest($req2);
        $reqEmp21->setEmployee($emp2);

        $manager->persist($reqEmp21);

        // record two
        $reqEmp22 = new RequestEmployee();
        $reqEmp22->setRequest($req2);
        $reqEmp22->setEmployee($emp5);

        $manager->persist($reqEmp22);

        /* third request */
        // record one
        $reqEmp31 = new RequestEmployee();
        $reqEmp31->setIsOwner(true);
        $reqEmp31->setRequest($req3);
        $reqEmp31->setEmployee($emp8);

        $manager->persist($reqEmp31);

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