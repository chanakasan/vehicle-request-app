<?php
namespace Panda86\AppBundle\Entity;

use Doctrine\ORM\EntityRepository;

class ReportRepository extends EntityRepository
{
    public function findAll()
    {
        return 'This is the result set';
    }

    public function findCostForCabs()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT r FROM Panda86AppBundle:ApprovedRequest r WHERE r.cab IS NOT NULL'
            )
            ->getResult();
    }

    public function findCostForAccomodations()
    {
    }

}