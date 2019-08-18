<?php
namespace Tournament\API\V1\Repositories;

use Doctrine\ORM\Query;
use Tournament\Entities\Group;
use Tournament\Entities\Statics\MatchStatus;
use Tournament\Repositories\Repository;

/**
 * Description of GroupRepository
 *
 * @author sr_hosseini <rassoul.hosseini at gmail.com>
 *
 * @method Group[] findAll(array $columns)
 * @method Group find(int $id)
 */
class GroupRepository extends Repository
{
    protected $entity = Group::class;

    public function maxSequenceNumber()
    {
        return $this->createQueryBuilder('g')
            ->select('Max(g.sequenceNo)')
            ->getQuery()
            ->getResult(Query::HYDRATE_SINGLE_SCALAR);
    }

    public function standing($groupId)
    {
        return $this->createQueryBuilder('g')
            ->join('g.matches', 'm')
            ->join('m.points', 'mp')
            ->join('mp.team', 't')
//            ->join('t.players', 'p')
            ->select([
                't.id AS id',
                't.name AS name',
//                'p.abrv',
                'Sum(1) AS matches',
                'Sum(mp.points) AS points'
            ])
            ->where('g.id = :groupId')
            ->andWhere('m.status = :matchStatus')
            ->groupBy('mp.team')
            ->orderBy('points', 'DESC')
            ->setParameters([
                'matchStatus' => MatchStatus::FINISHED,
                'groupId' => $groupId
            ])
            ->getQuery()
            ->getResult(Query::HYDRATE_ARRAY);
    }
}
