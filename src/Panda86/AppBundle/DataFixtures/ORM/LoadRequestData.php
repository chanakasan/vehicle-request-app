<?php

namespace Panda86\AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Panda86\AppBundle\Entity\Request;
use Panda86\AppBundle\Entity\VType;

class LoadRequestData implements FixtureInterface
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
            'vtype' => new VType(array(
                'name' => '4-passenger-sedan',
                'descrip' => 'Standard car with four passenger seats'
            )),
            'purpose' => 'Meeting'
        );
        $req2 = array(
            'journey_type' => 'return',
            'days' => 1,
            'pickup_loc' => 'ICTA',
            'pickup_time' =>  new \DateTime('2013-08-02 14:00:00'),
            'destination' => 'colombo',
            'return_time' => new \DateTime('2013-08-02 16:00:00'),
            'vtype' => new VType(array(
                'name' => '7-passenger-mini-van',
                'descrip' => ''
            )),
            'purpose' => 'Meeting',
        );
        $req3 = array(
            'journey_type' => 'return',
            'days' => 1,
            'pickup_loc' => 'ICTA',
            'pickup_time' =>  new \DateTime('2013-08-22 14:00:00'),
            'destination' => 'Colombo 10',
            'return_time' => new \DateTime('2013-08-22 18:00:00'),
            'vtype' => new VType(array(
                'name' => '12-passenger-van',
                'descrip' => ''
            )),
            'purpose' => 'Conference',
        );

        $request1 = new Request($req1);
        $request2 = new Request($req2);
        $request3 = new Request($req3);


        $manager->persist($request1);
        $manager->persist($request2);
        $manager->persist($request3);

        $manager->flush();
    }

}