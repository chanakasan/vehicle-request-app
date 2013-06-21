<?php

namespace Panda86\AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Panda86\AppBundle\Entity\Employee;

class LoadEmployeeData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $names = $this->_getAllNames();
        foreach($names as $name)
        {
            $employee = new Employee();
            $employee->setName($name);

            $manager->persist($employee);
            $manager->flush();
        }
    }

    private function _getAllNames()
    {
        $path_to_file = __DIR__.'/../employee-data.txt';
        $names = file($path_to_file);
        return $names;
    }
}