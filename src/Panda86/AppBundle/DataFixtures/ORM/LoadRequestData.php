<?php

namespace Panda86\AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Panda86\AppBundle\Entity\ApprovedCab;
use Panda86\AppBundle\Entity\ApprovedRequest;
use Panda86\AppBundle\Entity\Request;
use Panda86\AppBundle\Entity\RequestAccomodation;
use Panda86\AppBundle\Entity\RequestLink;

class LoadRequestData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $req1 = array(
            'journey_type' => 'single',
            'days' => 1,
            'pickup_loc' => 'ICTA',
            'pickup_time' =>  new \DateTime('2013-08-01 14:00:00'),
            'destination' => 'Colombo 1',
            'purpose' => 'Meeting'
        );
        $req2 = array(
            'journey_type' => 'return',
            'days' => 1,
            'pickup_loc' => 'Colombo 3',
            'pickup_time' =>  new \DateTime('2013-08-02 14:00:00'),
            'destination' => 'colombo 4',
            'return_time' => new \DateTime('2013-08-02 16:00:00'),
            'purpose' => 'Meeting',
        );
        $req3 = array(
            'journey_type' => 'return',
            'days' => 1,
            'pickup_loc' => 'ICTA',
            'pickup_time' =>  new \DateTime('2013-08-22 14:00:00'),
            'destination' => 'Colombo 10',
            'return_time' => new \DateTime('2013-08-22 18:00:00'),
            'purpose' => 'Conference',
        );

        $req4 = array(
            'journey_type' => 'return',
            'days' => 1,
            'pickup_loc' => 'ICTA',
            'pickup_time' =>  new \DateTime('2013-08-22 15:00:00'),
            'destination' => 'Colombo 1',
            'return_time' => new \DateTime('2013-08-22 19:00:00'),
            'purpose' => 'Conference',
        );

        $req5 = array(
            'journey_type' => 'return',
            'days' => 1,
            'pickup_loc' => 'Colombo 1',
            'pickup_time' =>  new \DateTime('2013-08-22 11:00:00'),
            'destination' => 'Colombo 5',
            'return_time' => new \DateTime('2013-08-22 14:00:00'),
            'purpose' => 'Conference',
        );

        $employees = $manager->getRepository('Panda86AppBundle:Employee')->findAll();
        $vtypes = $manager->getRepository('Panda86AppBundle:VType')->findAll();
        $vehicles = $manager->getRepository('Panda86AppBundle:Vehicle')->findAll();
        $drivers = $manager->getRepository('Panda86AppBundle:Driver')->findAll();
        $cab_services = $manager->getRepository('Panda86AppBundle:CabService')->findAll();

        $request1 = new Request($req1);
        $request1->setVType($vtypes[0]);
        $request1->setRequester($employees[0]);
        $request1->addAccompaniedBy($employees[1]);
        $request1->addAccompaniedBy($employees[2]);

        $request2 = new Request($req2);
        $request2->setVType($vtypes[0]);
        $request2->setRequester($employees[0]);
        $request2->addAccompaniedBy($employees[1]);
        $request2->addAccompaniedBy($employees[2]);

        $request3 = new Request($req3);
        $request3->setVType($vtypes[0]);
        $request3->setRequester($employees[0]);
        $request3->addAccompaniedBy($employees[1]);
        $request3->addAccompaniedBy($employees[2]);

        $request4 = new Request($req4);
        $request4->setVType($vtypes[0]);
        $request4->setRequester($employees[0]);
        $request4->addAccompaniedBy($employees[1]);
        $request4->addAccompaniedBy($employees[2]);

        $request5 = new Request($req5);
        $request5->setVType($vtypes[0]);
        $request5->setRequester($employees[0]);
        $request5->addAccompaniedBy($employees[1]);
        $request5->addAccompaniedBy($employees[2]);

        $manager->persist($request1);
        $manager->persist($request2);
        $manager->persist($request3);
        $manager->persist($request4);
        $manager->persist($request5);

        $j = 1;
        /* Add some more requests */
        for($i=0; $i<50; $i++)
        {
            if($j < 9) $j++;
            $req_data = array(
                'journey_type' => 'single',
                'days' => 1,
                'pickup_loc' => 'ICTA',
                'pickup_time' =>  new \DateTime("2013-08-0{$j} 14:00:00"),
                'destination' => 'Colombo',
                'purpose' => 'Meeting'
            );
            $request = new Request($req_data);
            $request->setRequester($employees[0]);
            $request->setVType($vtypes[0]);

            $manager->persist($request);

            if($i % 7 === 0 ) /* assign company vehicles */
            {
                $approve = new ApprovedRequest();
                $approve->setRequest($request);
                $approve->setVehicle($vehicles[0]);
                $approve->setDriver($drivers[0]);

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
                $approve->setVehicle($vehicles[0]);
                $approve->setDriver($drivers[0]);

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