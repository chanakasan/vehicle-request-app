<?php
namespace Panda86\AppBundle\Entity;

use Doctrine\ORM\EntityRepository;

class ReportRepository extends EntityRepository
{
    public function findAll()
    {
        return 'This is the result set';
    }

    public function findCostForCabs(\DateTime $from = null, \DateTime $to = null)
    {
        if(!$from && !$to)
        {
            return $this->getEntityManager()
                ->createQuery(
                    'SELECT r FROM Panda86AppBundle:ApprovedRequest r WHERE r.cab IS NOT NULL'
                )
                ->getResult();
        }
    }

    public function findCostForAccomodations(\DateTime $from = null, \DateTime $to = null)
    {
        if(!$from && !$to)
        {
            return $this->getEntityManager()
                ->createQuery(
                    'SELECT r FROM Panda86AppBundle:Request r WHERE r.status = 1 AND r.accomodation IS NOT NULL'
                )
                ->getResult();
        }
    }

}