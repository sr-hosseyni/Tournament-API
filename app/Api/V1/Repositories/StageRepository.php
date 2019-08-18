<?php
namespace Tournament\API\V1\Repositories;

use Tournament\Entities\Stage;
use Tournament\Repositories\Repository;

/**
 * Description of StageRepository
 *
 * @author sr_hosseini <rassoul.hosseini at gmail.com>
 */
class StageRepository extends Repository
{
    protected $entity = Stage::class;
}
