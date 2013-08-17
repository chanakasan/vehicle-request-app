<?php

namespace Panda86\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Panda86\UserBundle\Entity\User;

class LoadUserData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $userAdmin = new User();
        $userAdmin->addRole('ROLE_ADMIN');
        $userAdmin->setEnabled(true);
        $userAdmin->setFirstName('John');
        $userAdmin->setLastName('Doe');
        $userAdmin->setUsername('admin123');
        $userAdmin->setEmail('admin@webm.com');
        $userAdmin->setPlainPassword('pass123');

        $manager->persist($userAdmin);
        $manager->flush();
    }
}