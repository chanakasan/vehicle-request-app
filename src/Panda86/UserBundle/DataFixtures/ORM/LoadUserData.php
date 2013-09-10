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
        for($i=1; $i<=10 ;$i++)
        {
            $admin = new User();
            $admin->setEnabled(true);
            $admin->addRole('ROLE_ADMIN'); # assign admin role
            $admin->setFirstName('John');
            $admin->setLastName('Doe');
            $admin->setUsername("admin00".$i);
            $admin->setEmail("admin00$i@webm.com");
            $admin->setPlainPassword('pass123');
            $manager->persist($admin);
 
            $super_admin = new User();
            $super_admin->setEnabled(true);
            $super_admin->setSuperAdmin(true); # create super admin
            $super_admin->setFirstName('Martin');
            $super_admin->setLastName('Doe');
            $super_admin->setUsername("su00$i");
            $super_admin->setEmail("su00$i@webm.com");
            $super_admin->setPlainPassword('pass123');
            $manager->persist($super_admin);
        }
        $manager->flush();
    }
}