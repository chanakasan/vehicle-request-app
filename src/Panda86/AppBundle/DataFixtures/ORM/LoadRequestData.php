<?php

namespace Panda86\AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Panda86\AppBundle\Entity\Request;
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

        $request1 = new Request($req1);
        $request1->setVType($vtypes[0]);
        $request1->setRequester($employees[0]);
        $request1->addAccompaniedBy($employees[1]);
        $request1->addAccompaniedBy($employees[2]);

        $request2 = new Request($req1);
        $request2->setVType($vtypes[0]);
        $request2->setRequester($employees[0]);
        $request2->addAccompaniedBy($employees[1]);
        $request2->addAccompaniedBy($employees[2]);

        $request3 = new Request($req1);
        $request3->setVType($vtypes[0]);
        $request3->setRequester($employees[0]);
        $request3->addAccompaniedBy($employees[1]);
        $request3->addAccompaniedBy($employees[2]);

        $request4 = new Request($req1);
        $request4->setVType($vtypes[0]);
        $request4->setRequester($employees[0]);
        $request4->addAccompaniedBy($employees[1]);
        $request4->addAccompaniedBy($employees[2]);

        $request5 = new Request($req1);
        $request5->setVType($vtypes[0]);
        $request5->setRequester($employees[0]);
        $request5->addAccompaniedBy($employees[1]);
        $request5->addAccompaniedBy($employees[2]);

        $manager->persist($request1);
        $manager->persist($request2);
        $manager->persist($request3);
        $manager->persist($request4);
        $manager->persist($request5);

        $req1Link = new RequestLink();
        $req1Link->setRequest($request1);
        $req1Link->setCode($this->_random_string(128));
        $manager->persist($req1Link);

        $req2Link = new RequestLink();
        $req2Link->setRequest($request2);
        $req2Link->setCode($this->_random_string(128));
        $manager->persist($req2Link);

        $req3Link = new RequestLink();
        $req3Link->setRequest($request3);
        $req3Link->setCode($this->_random_string(128));
        $manager->persist($req3Link);

        $req4Link = new RequestLink();
        $req4Link->setRequest($request4);
        $req4Link->setCode($this->_random_string(128));
        $manager->persist($req4Link);

        $req5Link = new RequestLink();
        $req5Link->setRequest($request5);
        $req5Link->setCode($this->_random_string(128));
        $manager->persist($req5Link);

//        $j = 1;
//        /* Add some more requests */
//        for($i=0; $i<10; $i++)
//        {
//            if($j < 9) $j++;
//            $req_data = array(
//                'journey_type' => 'single',
//                'days' => 1,
//                'pickup_loc' => 'ICTA',
//                'pickup_time' =>  new \DateTime("2013-08-0{$j} 14:00:00"),
//                'destination' => 'colombo',
//                'purpose' => 'Meeting'
//            );
//
//            $request = new Request($req_data);
//            $request->setVType($vtypes[0]);
//
//            $manager->persist($request);
//
//            $reqLink = new RequestLink();
//            $reqLink->setRequest($request);
//            $reqLink->setCode($this->_random_string(128));
//            $manager->persist($reqLink);
//
//        }
        $manager->flush();
    }

    private function _random_string($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
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