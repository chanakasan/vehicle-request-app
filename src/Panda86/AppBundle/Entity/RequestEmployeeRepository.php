<?php

namespace Panda86\AppBundle\Entity;

use Doctrine\ORM\EntityRepository;

class RequestEmployeeRepository extends EntityRepository
{
    public function getList()
    {
        $result = $this->_processList();
        return $result;
    }
    
    private function _processList()
    {
        $query = $this->getEntityManager()->createQuery('
                    SELECT c FROM Panda86AppBundle:RequestEmployee c
                ');
        
        return $query->getResult();
    }
}

