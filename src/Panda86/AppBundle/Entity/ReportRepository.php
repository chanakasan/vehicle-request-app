<?php
namespace Panda86\AppBundle\Entity;

use Doctrine\ORM\EntityRepository;

class ReportRepository extends EntityRepository
{
    public function findAll()
    {
        return 'This is the result set';
    }
}