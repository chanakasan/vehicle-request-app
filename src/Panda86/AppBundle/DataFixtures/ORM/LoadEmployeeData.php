<?php

namespace Panda86\AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Panda86\AppBundle\Entity\Employee;

class LoadEmployeeData extends AbstractFixture  implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        /* Please remove this record */
        $tmp = new Employee();
        $tmp->setName('Chanaka Sandaruwan');
        $tmp->setEmail('chanakasan@gmail.com');
        $manager->persist($tmp);
        /* End - Remove this record */

        /* Load sample data */
        $names = $this->_getAllNames();
        foreach($names as $name)
        {
            $employee = new Employee();
            $employee->setName($name);

            $manager->persist($employee);
        }
        $manager->flush();
    }

    private function _getAllNames()
    {
        $path_to_file = __DIR__.'/../employee-data.txt';
        $names = file($path_to_file);
        return $names;
    }

    /**
     * Get the order of this execution
     *
     * @return int
     */
    public function getOrder()
    {
        return 2;
    }
}