<?php
namespace Tournament\Entities\Repositories\Tournament;

use Doctrine\Common\Collections\Criteria;
use Doctrine\ORM\Query;
use Tournament\Entities\Repositories\Repository;
use Tournament\Entities\Tournament;

/**
 * Description of TournamentRepository
 *
 * @author sr_hosseini <rassoul.hosseini at gmail.com>
 */
class TournamentRepository extends Repository
{
    public function pushCriteria()
    {
        $criteria1 = Criteria::create()
            ->where(Criteria::expr()->eq('sequenceNo', 1))
            ->orderBy(['id' => 'ASC']);

        $criteria2 = Criteria::create()
            ->where(Criteria::expr()->eq('platform', 'Foosball'))
            ->orderBy(['type' => 'ASC'])
            ->setMaxResults(2);

        return $this->createQueryBuilder('r')
            ->addCriteria($criteria1)
            ->addCriteria($criteria2)
            ->getQuery()
            ->getResult();
    }

    public function matching(Criteria $criteria)
    {
        parent::matching($criteria);
    }

    public function newQueryBuilder($alias, $indexBy = null)
    {
        $qb = new TournamentQueryBuilder($this->_em);

        return $qb
            ->select($alias)
            ->from($this->_entityName, $alias, $indexBy);
    }

    public function entity()
    {
        return Tournament::class;
    }

    public function maxSequenceNumber()
    {
        return $this->createQueryBuilder('t')
            ->select('Max(t.sequenceNo)')
            ->getQuery()
            ->getResult(Query::HYDRATE_SINGLE_SCALAR);
    }
}
