<?php

namespace Panda86\AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Panda86\AppBundle\Entity\ApprovedCab;
use Panda86\AppBundle\Entity\ApprovedRequest;
use Panda86\AppBundle\Entity\DisapprovedRequest;
use Panda86\AppBundle\Entity\Request;
use Panda86\AppBundle\Entity\RequestAccomodation;
use Panda86\AppBundle\Entity\RequestLink;
use Panda86\UserBundle\Entity\User;

class LoadRequestData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $employees = $manager->getRepository('Panda86AppBundle:Employee')->findAll();
        $vtypes = $manager->getRepository('Panda86AppBundle:VType')->findAll();
        $vehicles = $manager->getRepository('Panda86AppBundle:Vehicle')->findAll();
        $drivers = $manager->getRepository('Panda86AppBundle:Driver')->findAll();
        $cab_services = $manager->getRepository('Panda86AppBundle:CabService')->findAll();
        $users = $manager->getRepository('Panda86UserBundle:User')->findAll();

        /* From 2013-01-01 */
        for($i=1; $i<=3 ;$i++)
        {
            $req1 = array(
                'journey_type' => 'single',
                'days' => 1,
                'pickup_loc' => 'ICTA',
                'pickup_time' =>  new \DateTime("2013-01-0{$i} 14:{$i}0:00"),
                'destination' => 'Colombo 1',
                'purpose' => 'Meeting'
            );
            $request1 = new Request($req1);
            $request1->setVType($vtypes[2]);
            $request1->setRequester($employees[0]);
            $request1->addAccompaniedBy($employees[1]);
            $request1->addAccompaniedBy($employees[2]);

            $cab = new ApprovedCab();
            $cab->setCabService($cab_services[0]);
            $cab->setCost(111.11 + 100*$i);

            $approve1 = new ApprovedRequest();
            $approve1->setRequest($request1);
            $approve1->setCab($cab);
            $approve1->setApprovedBy($users[rand(1,19)]);

            $manager->persist($approve1);
        }

        /* From 2013-02-01 */
        for($i=1; $i<=5 ;$i++)
        {
            $req1 = array(
                'journey_type' => 'single',
                'days' => 1,
                'pickup_loc' => 'ICTA',
                'pickup_time' =>  new \DateTime("2013-02-0{$i} 14:{$i}0:00"),
                'destination' => 'Colombo 1',
                'purpose' => 'Meeting'
            );
            $request1 = new Request($req1);
            $request1->setVType($vtypes[2]);
            $request1->setRequester($employees[0]);
            $request1->addAccompaniedBy($employees[1]);
            $request1->addAccompaniedBy($employees[2]);

            $cab = new ApprovedCab();
            $cab->setCabService($cab_services[0]);
            $cab->setCost(222.22 + 100*$i);

            $approve1 = new ApprovedRequest();
            $approve1->setRequest($request1);
            $approve1->setCab($cab);
            $approve1->setApprovedBy($users[rand(1,19)]);

            $manager->persist($approve1);
        }

        /* From 2013-03-01 */
        for($i=1; $i<=5 ;$i++)
        {
            $req1 = array(
                'journey_type' => 'single',
                'days' => 1,
                'pickup_loc' => 'ICTA',
                'pickup_time' =>  new \DateTime("2013-03-0{$i} 14:{$i}0:00"),
                'destination' => 'Colombo 1',
                'purpose' => 'Meeting'
            );
            $request1 = new Request($req1);
            $request1->setVType($vtypes[2]);
            $request1->setRequester($employees[0]);
            $request1->addAccompaniedBy($employees[1]);
            $request1->addAccompaniedBy($employees[2]);

            $cab = new ApprovedCab();
            $cab->setCabService($cab_services[0]);
            $cab->setCost(333.33 + 100*$i);

            $approve1 = new ApprovedRequest();
            $approve1->setRequest($request1);
            $approve1->setCab($cab);
            $approve1->setApprovedBy($users[rand(1,19)]);

            $manager->persist($approve1);
        }

        /* Extra: add some more requests */
        $j = 1;
        for($i=0; $i<100; $i++)
        {
            if($j < 9) $j++;
            $req_data = array(
                'journey_type' => 'single',
                'days' => 1,
                'pickup_loc' => 'ICTA',
                'pickup_time' =>  new \DateTime("2014-08-0{$j} 14:00:00"),
                'destination' => 'Colombo',
                'purpose' => 'Meeting'
            );
            $request = new Request($req_data);
            $request->setRequester($employees[rand(0,25)]);
            $request->setVType($vtypes[1]);

            $manager->persist($request);

            if($i % 13 === 0 ) /* Disaaproved requests */
            {
                $approve = new DisapprovedRequest();
                $approve->setRequest($request);
                $approve->setDisapprovedBy($users[rand(1,19)]);

                $manager->persist($approve);
            }
            elseif($i % 7 === 0 ) /* assign company vehicles */
            {
                $approve = new ApprovedRequest();
                $approve->setRequest($request);
                $approve->setVehicle($vehicles[1]);
                $approve->setDriver($drivers[0]);
                $approve->setApprovedBy($users[rand(1,19)]);

                $manager->persist($approve);
            }
            elseif($i % 5 === 0 ) /* request accomodation */
            {
                $accomodation = new RequestAccomodation();
                $accomodation->setNoDays($i);
                $accomodation->setTotalFee(999.99 + 99.99 * $i);
                $request->setAccomodation($accomodation);

                $approve = new ApprovedRequest();
                $approve->setRequest($request);
                $approve->setVehicle($vehicles[1]);
                $approve->setDriver($drivers[0]);
                $approve->setApprovedBy($users[rand(1,19)]);

                $manager->persist($approve);
            }
            elseif($i % 3 === 0 ) /* assign cabs */
            {
                $cab = new ApprovedCab();
                $cab->setCabService($cab_services[0]);
                $cab->setCost(999.99 + 9.99 * $i);

                $approve = new ApprovedRequest();
                $approve->setRequest($request);
                $approve->setCab($cab);
                $approve->setApprovedBy($users[rand(1,19)]);

                $manager->persist($approve);
            }
            elseif($i % 2 === 0 ) /* request accomodation and assign cabs */
            {
                $accomodation = new RequestAccomodation();
                $accomodation->setNoDays($i);
                $accomodation->setTotalFee(999.99 + 99.99 * $i);
                $request->setAccomodation($accomodation);

                $cab = new ApprovedCab();
                $cab->setCabService($cab_services[0]);
                $cab->setCost(999.99 + 9.99 * $i);

                $approve = new ApprovedRequest();
                $approve->setRequest($request);
                $approve->setCab($cab);
                $approve->setApprovedBy($users[rand(1,19)]);
                $manager->persist($approve);
            }

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