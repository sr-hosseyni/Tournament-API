<?php
namespace Tournament\API\V1\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Description of InvitationRepository
 *
 * @author sr_hosseini <rassoul.hosseini at gmail.com>
 */
class InvitationRepository extends BaseRepository
{
    public function model()
    {
        return 'Tournament\Entities\Invitation';
    }
}
