<?php

namespace Panda86\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Panda86\UserBundle\Entity\Driver;

class LoadDriverData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */


    public function load(ObjectManager $manager)
    {
//        $driver = new Driver();
//        $driver->setFirstName('Nimal');
//        $driver->setLastName('Perera');
//        $driver->setDob('19750101');
//        $driver->setAddress('No\:23\, Cross Street\, New town');
//
//
//        $manager->persist($driver);
//        $manager->flush();
    }

}