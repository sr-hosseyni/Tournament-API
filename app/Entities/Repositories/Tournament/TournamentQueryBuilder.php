<?php

namespace Tournament\Entities\Repositories\Tournament;

use Doctrine\Common\Collections\Criteria;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Database\Eloquent\Model;
use Tournament\Entities\Repositories\QueryBuilder;
use Tournament\Properties\Fields;

/**
 * Description of ActiveInvitations
 *
 * @author sr_hosseini <rassoul.hosseini at gmail.com>
 */
final class TournamentQueryBuilder extends QueryBuilder
{
    /**
     * @param Model $model
     * @param Repository $repository
     * @return Model
     */
    public function openTournaments()
    {
//        $criteria = Criteria::create()
//            ->where(sprintf('NOW() BETWEEN %s AND %s',
////                Fields::TOURNAMENT_REGISTER_START,
////                Fields::TOURNAMENT_REGISTER_FINISH
//                't.registerStart',
//                't.registerFinish'
//            ));
//        $this->addCriteria($criteria);

//        $this->where(sprintf('NOW() BETWEEN %s AND %s',
        $this->where(sprintf('\'%s\' BETWEEN %s AND %s',
//                Fields::TOURNAMENT_REGISTER_START,
//                Fields::TOURNAMENT_REGISTER_FINISH
            date('Y-m-d H:i:s'),
            't.registerStart',
            't.registerFinish'
        ));


        return $this;
    }

    public function startedTournaments()
    {
        $criteria = Criteria::create()
            ->where(Criteria::expr()
                ->gt('competitionStart', ':now')
            );
        $this->addCriteria($criteria);//->setParameter('now', new \DateTime());
        return $this;
    }
}
