<?php

namespace Panda86\AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Panda86\AppBundle\Entity\Vehicle;
use Panda86\AppBundle\Entity\VType;

class LoadVehicleData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {         
        $vehicle1 = new Vehicle();
        $vehicle1->setMake('Toyota');
        $vehicle1->setModel('Corolla');        
        $vehicle1->setRegNo('XX-1234');
        $vehicle1->setAc(true);
        $vehicle1->setPassengers(3);
        $vehicle1->setIsCompanyOwned(true);

        $vehicle2 = new Vehicle();
        $vehicle2->setMake('Toyota');
        $vehicle2->setModel('Townace');
        $vehicle2->setRegNo('XX-1235');
        $vehicle2->setAc(true);
        $vehicle2->setPassengers(8);
        $vehicle2->setIsCompanyOwned(true);
        
        $vehicle3 = new Vehicle();
        $vehicle3->setMake('Hyundai');
        $vehicle3->setModel('Santa Fe');
        $vehicle3->setRegNo('XX-1236');
        $vehicle3->setPassengers(3);
        $vehicle3->setAc(true);
        $vehicle3->setIsCompanyOwned(true);

        $vtype1 = new VType();
        $vtype1->setName('12-passenger Van');
        $vtype1->setPassengers(12);
        $vtype1->setType('van');
        $vtype1->getVehicles()->add($vehicle2);
        $vehicle2->setVtype($vtype1);

        $vtype2 = new VType();
        $vtype2->setName('4-passenger Sedan');
        $vtype2->setPassengers(4);
        $vtype2->setType('sedan');
        $vtype2->setDescrip('Standard car with four passenger seats');
        $vtype2->getVehicles()->add($vehicle1);
        $vehicle1->setVtype($vtype2);

        $vtype3 = new VType();
        $vtype3->setName('4-passenger Jeep');
        $vtype3->setPassengers(4);
        $vtype3->setType('jeep');
        $vtype3->getVehicles()->add($vehicle3);
        $vehicle3->setVtype($vtype3);

        $manager->persist($vtype1);
        $manager->persist($vtype2);
        $manager->persist($vtype3);
        $manager->persist($vehicle1);
        $manager->persist($vehicle2);
        $manager->persist($vehicle3);
        $manager->flush();
    }

    /**
     * Get the order of this execution
     *
     * @return int
     */
    public function getOrder()
    {
        return 3;
    }
}