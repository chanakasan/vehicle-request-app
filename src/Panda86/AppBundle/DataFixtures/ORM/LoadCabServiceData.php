<?php

namespace Panda86\AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Panda86\AppBundle\Entity\CabService;

class LoadCabServiceData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {         
        $cab1 = new CabService();
        $cab1->setName('Kango');
        $cab1->setHotline('011-2577577');
        $manager->persist($cab1);

        $cab2 = new CabService();
        $cab2->setName('Kangaroo');
        $cab2->setHotline('011-2588588');
        $manager->persist($cab2);

        $manager->flush();
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