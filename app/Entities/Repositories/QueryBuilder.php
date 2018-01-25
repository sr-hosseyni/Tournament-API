<?php
namespace Tournament\Entities\Repositories;;

use Doctrine\ORM\QueryBuilder as DoctrineQueryBuilder;
use LaravelDoctrine\ORM\Facades\EntityManager;

/**
 * Description of QueryBuilder
 *
 * @author sr_hosseini <rassoul.hosseini at gmail.com>
 */
class QueryBuilder extends DoctrineQueryBuilder
{
    public function __construct(EntityManager $em)
    {
        parent::__construct($em);
    }

    public function all()
    {
        return $this->getQuery()->execute();
    }

    public function one()
    {
        $result = $this->setMaxResults(1)->getQuery()->execute();
        if ($result) {
            return $result[0];
        }

        return false;
    }
}
