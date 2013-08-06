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
        $params1 = array(
            'first_name' => 'John',
            'last_name' => 'Doe',
            'display_name' => 'John Doe',
            'birth_date' => new \DateTime('1980-01-01'),
            'license_date' => new \DateTime('2008-07-01'),
            'license_ref' => 'WP14124519V',
            'address' => '456/B, New Strret, New Town',
            'mobile' => 94777123456,
            'created' => new \DateTime('now')
        );
        $driver1 = new Driver($params1);
        $manager->persist($driver1);

        $params2 = array(
            'first_name' => 'Martin',
            'last_name' => 'Doe',
            'display_name' => 'Martin Doe',
            'birth_date' => new \DateTime('1980-01-01'),
            'license_date' => new \DateTime('2008-07-01'),
            'license_ref' => 'WP14124519V',
            'address' => '456/B, New Strret, New Town',
            'mobile' => 94777123456,
            'created' => new \DateTime('now')
        );
        $driver2 = new Driver($params2);
        $manager->persist($driver2);

        $params3 = array(
            'first_name' => 'Ben',
            'last_name' => 'Doe',
            'display_name' => 'Ben Doe',
            'birth_date' => new \DateTime('1980-01-01'),
            'license_date' => new \DateTime('2008-07-01'),
            'license_ref' => 'WP14124519V',
            'address' => '456/B, New Strret, New Town',
            'mobile' => 94777123456,
            'created' => new \DateTime('now')
        );
        $driver3 = new Driver($params3);
        $manager->persist($driver3);

        $manager->flush();
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