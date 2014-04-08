<?php

namespace Mautic\UserBundle\Entity;

use Doctrine\ORM\Tools\Pagination\Paginator;
use Mautic\CoreBundle\Entity\CommonRepository;

/**
 * RoleRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class RoleRepository extends CommonRepository
{
    /**
     * Retrieves a list of roles
     *
     * @param int    $start
     * @param int    $limit
     * @param string $orderBy
     * @param string $orderByDir
     * @return Paginator
     */
    public function getRoles($start = 0, $limit = 30, $orderBy = 'r.name', $orderByDir = "ASC") {
        $q = $this
            ->createQueryBuilder('r')
            ->orderBy($orderBy, $orderByDir)
            ->setFirstResult($start)
            ->setMaxResults($limit)
            ->getQuery();
        $result = new Paginator($q);
        return $result;
    }
}