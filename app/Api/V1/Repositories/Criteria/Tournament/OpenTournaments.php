<?php

namespace Tournament\API\V1\Repositories\Criteria\Tournament;

use Illuminate\Contracts\Config\Repository;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;
use Tournament\Properties\Fields;

/**
 * Description of ActiveInvitations
 *
 * @author sr_hosseini <rassoul.hosseini at gmail.com>
 */
final class OpenTournaments implements CriteriaInterface
{
    /**
     * @param Model $model
     * @param Repository $repository
     * @return Model
     */
    public function apply($model, RepositoryInterface $repository)
    {
        return $model->whereRaw(
            sprintf('NOW() BETWEEN %s AND %s',
                Fields::TOURNAMENT_REGISTER_START,
                Fields::TOURNAMENT_REGISTER_FINISH
            )
        );
    }
}
