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
     * Returns entity with request details and requester details
     * @param mixed $id
     * @return array|null|object
     */
    public function find($id)
    {
        $query = $this->getEntityManager()->createQuery('
                    SELECT c FROM Panda86AppBundle:RequestEmployee c WHERE c.request =?1 AND c.isOwner = ?2
                ');
        $query->setParameter(1, $id);
        $query->setParameter(2, true);

        $result =  $query->getResult();

        if($result[0]->getIsOwner())
            return $result[0];
        else
            throw new \Exception('Error in app logic');
    }

    /**
     * Returns other passengers associated with a request
     * @param $id
     * @return array
     */
    public function findOtherPassengers($id)
    {
        $query1 = $this->getEntityManager()->createQuery('
                    SELECT c FROM Panda86AppBundle:RequestEmployee c WHERE c.request = ?1 AND c.isOwner = ?2
                ');
        $query1->setParameter(1, $id);
        $query1->setParameter(2, false);

        return $query1->getResult();
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

