<?php

namespace Panda86\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Panda86\UserBundle\Entity\Vehicle;

class LoadVehicleData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $vehicle1 = new Vehicle();
        $vehicle1->setMake('Toyota');
        $vehicle1->setModel('Corolla');
        $vehicle1->setType('car');
        $vehicle1->setRegNo('XX-1234');
        $vehicle1->setAc(true);
        $vehicle1->setPassengerNo(3);

        $vehicle2 = new Vehicle();
        $vehicle2->setMake('Toyota');
        $vehicle2->setModel('Townace');
        $vehicle2->setType('van');
        $vehicle2->setRegNo('XX-1234');
        $vehicle2->setAc(true);
        $vehicle2->setPassengerNo(8);

        $vehicle3 = new Vehicle();
        $vehicle3->setMake('Hyundai');
        $vehicle3->setModel('Santa Fe');
        $vehicle3->setType('jeep');
        $vehicle3->setRegNo('XX-1234');
        $vehicle3->setPassengerNo(3);
        $vehicle3->setAc(true);

        $manager->persist($vehicle1);
        $manager->persist($vehicle2);
        $manager->persist($vehicle3);
        $manager->flush();
    }
}