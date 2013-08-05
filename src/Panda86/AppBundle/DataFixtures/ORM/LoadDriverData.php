<?php

namespace Panda86\AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Panda86\AppBundle\Entity\Driver;

class LoadDriverData extends AbstractFixture implements OrderedFixtureInterface
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

    /**
     * Get the order of this execution
     *
     * @return int
     */
    public function getOrder()
    {
        return 1;
    }

}