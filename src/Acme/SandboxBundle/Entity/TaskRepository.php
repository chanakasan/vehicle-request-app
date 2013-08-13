<?php

namespace Acme\SandboxBundle\Entity;

use Doctrine\ORM\EntityRepository;

class TaskRepository extends EntityRepository
{
    public function findAllOrderedByName()
    {
        return $this->getEntityManager()
            ->createQuery('SELECT p FROM AcmeSandboxBundle:Task p ORDER BY p.name ASC')
            ->getResult();
    }
}