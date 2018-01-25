<?php

namespace Tournament\Core\Repositories\Criteria\Invitation;

use Illuminate\Contracts\Config\Repository;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;
use Tournament\Entities\Invitation;
use Tournament\Properties\Fields;

/**
 * Description of ActiveInvitations
 *
 * @author sr_hosseini <rassoul.hosseini at gmail.com>
 */
final class MyInvitations implements CriteriaInterface
{

    /**
     * @param Invitation $model
     * @param Repository $repository
     * @return Model
     */
    public function apply($model, RepositoryInterface $repository)
    {
        return $model->where(function($query) {
            $query->where(Fields::INVITATION_APPLIER_USER_ID, '=', auth()->user()->id)
                ->orWhere(Fields::INVITATION_REFERRED_USER_ID, '=', auth()->user()->id);
        });
    }
}
