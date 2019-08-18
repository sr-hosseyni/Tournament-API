<?php
namespace Tournament\API\V1\Repositories;

use Tournament\Entities\Match;
use Tournament\Repositories\Repository;

/**
 * Description of InvitationRepository
 *
 * @author sr_hosseini <rassoul.hosseini at gmail.com>
 *
 * @method Match[] findAll(array $columns)
 */
class MatchRepository extends Repository
{
    protected $entity = Match::class;
}
