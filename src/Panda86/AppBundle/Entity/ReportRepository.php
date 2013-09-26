<?php
namespace Panda86\AppBundle\Entity;

use Doctrine\ORM\EntityRepository;

class ReportRepository extends EntityRepository
{
    public function findAll()
    {
        return 'This is the result set';
    }

    public function findCostForCabs($f = null, $t = null)
    {
        if($f && $t)
        {
            $from = new \DateTime($f);
            $from->setTime(0,0,0);
            $to = new \DateTime($t);
            $to->setTime(23,59,59);

            return $this->getEntityManager()
                ->createQuery(
                    "SELECT a FROM Panda86AppBundle:ApprovedRequest a JOIN a.request r WHERE a.cab IS NOT NULL AND r.pickup_time BETWEEN :from AND :to"
                )
                ->setParameter('from', $from->format('Y-m-d H:i:s'))
                ->setParameter('to', $to->format('Y-m-d H:i:s'))
                ->getResult();
        }
        elseif($f && !$t)
        {
            $from = new \DateTime($f);
            $from->setTime(0,0,0);

            return $this->getEntityManager()
                ->createQuery(
                    "SELECT a FROM Panda86AppBundle:ApprovedRequest a JOIN a.request r WHERE a.cab IS NOT NULL AND r.pickup_time > :from"
                )
                ->setParameter('from', $from->format('Y-m-d H:i:s'))
                ->getResult();
        }
        elseif(!$f && $t)
        {
            $to = new \DateTime($t);
            $to->setTime(23,59,59);

            return $this->getEntityManager()
                ->createQuery(
                    "SELECT a FROM Panda86AppBundle:ApprovedRequest a JOIN a.request r WHERE a.cab IS NOT NULL AND r.pickup_time < :to"
                )
                ->setParameter('to', $to->format('Y-m-d H:i:s'))
                ->getResult();
        }
        elseif(!$f && !$t)
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