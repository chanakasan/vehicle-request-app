<?php

namespace Panda86\AppBundle\Entity;

use Doctrine\ORM\EntityRepository;

class RequestEmployeeRepository extends EntityRepository
{
    /**
     * Return all requests with owner/passenger details
     * @return array
     */
    public function getList()
    {
        $result = $this->_processList();
        return $result;
    }

    /**
     * @todo Find more efficient way to do this
     * @return array
     */
    private function _processList()
    {
        $all_requests = array();

        // find non-owner employees per request
        $tmp_query = $this->getEntityManager()->createQuery('
                    SELECT c FROM Panda86AppBundle:RequestEmployee c WHERE c.isOwner = ?1
                ');
        $tmp_query->setParameter(1, false);
        $tmp_rowset = $tmp_query->getResult();

        // get all unique requests
        $query = $this->getEntityManager()->createQuery('
                    SELECT c FROM Panda86AppBundle:RequestEmployee c WHERE c.isOwner = ?1
                ');
        $query->setParameter(1, true);
        $rowset = $query->getResult();

        foreach($rowset as $row)
        {
            $new_request = array();
            $new_request['request'] = $row->getRequest();
            $new_request['owner'] = $row->getEmployee();
            $new_request['otherPassengers'] = array();

            foreach($tmp_rowset as $tmp_row)
            {
                if($tmp_row->getRequest()->getId() === $row->getRequest()->getId())
                {
                    $new_request['otherPassengers'][] = $tmp_row->getEmployee();
                }
            }
            $all_requests[] = $new_request;
        }

        return $all_requests;
    }
}

