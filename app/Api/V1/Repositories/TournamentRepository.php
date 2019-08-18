<?php
namespace Tournament\API\V1\Repositories;

use Tournament\Entities\Tournament;
use Tournament\Repositories\Repository;

/**
 * Description of TournamentRepository
 *
 * @author sr_hosseini <rassoul.hosseini at gmail.com>
 */
class TournamentRepository extends Repository
{
    protected $entity = Tournament::class;
}
