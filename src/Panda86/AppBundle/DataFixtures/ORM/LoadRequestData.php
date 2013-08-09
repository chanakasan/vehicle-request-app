<?php

namespace Panda86\AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Panda86\AppBundle\Entity\Request;
use Panda86\AppBundle\Entity\VType;

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
            'destination' => 'colombo',
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

        $vtypes =  $manager->getRepository('Panda86AppBundle:VType')->findAll();

        $request1 = new Request($req1);
        $request1->setVType($vtypes[0]);

        $request2 = new Request($req2);
        $request2->setVType($vtypes[1]);

        $request3 = new Request($req3);
        $request3->setVType($vtypes[2]);

        $request4 = new Request($req4);
        $request4->setVType($vtypes[2]);

        $request5 = new Request($req5);
        $request5->setVType($vtypes[2]);

        $manager->persist($request1);
        $manager->persist($request2);
        $manager->persist($request3);
        $manager->persist($request4);
        $manager->persist($request5);

        /* Add some more requests */
        for($i=0; $i<10; $i++)
        {
            $req_data = array(
                'journey_type' => 'single',
                'days' => 1,
                'pickup_loc' => 'ICTA',
                'pickup_time' =>  new \DateTime('2013-08-01 14:00:00'),
                'destination' => 'colombo',
                'purpose' => 'Meeting'
            );

            $request = new Request($req_data);
            $request->setVType($vtypes[0]);

            $manager->persist($request);
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
        return 4;
    }

}