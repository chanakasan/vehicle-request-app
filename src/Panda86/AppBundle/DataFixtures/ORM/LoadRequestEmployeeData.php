<?php

namespace Panda86\AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Panda86\AppBundle\Entity\RequestEmployee;
use Panda86\AppBundle\Entity\Request;
use Panda86\AppBundle\Entity\Employee;

class LoadRequestEmployeeData implements FixtureInterface
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

        /* first record */
        $reqEmp1 = new RequestEmployee();
        $reqEmp1->setIsOwner(true);
        $reqEmp1->setRequest($req1);
        $reqEmp1->setEmployee($emp1);

        $manager->persist($req1);
        $manager->persist($emp1);
        $manager->persist($reqEmp1);

        /* second record */
        $reqEmp2 = new RequestEmployee();
        $reqEmp2->setRequest($req1);
        $reqEmp2->setEmployee($emp2);

        $manager->persist($req1);
        $manager->persist($emp1);
        $manager->persist($reqEmp2);

        /* third record */
        $reqEmp3 = new RequestEmployee();
        $reqEmp3->setIsOwner(true);
        $reqEmp3->setRequest($req2);
        $reqEmp3->setEmployee($emp2);

        $manager->persist($req2);
        $manager->persist($emp2);
        $manager->persist($reqEmp3);

        $manager->flush();
    }

}