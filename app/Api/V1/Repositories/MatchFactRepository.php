<?php

namespace Tournament\API\V1\Repositories;

use Tournament\Entities\MatchFact;
use Tournament\Repositories\Repository;

/**
 * Description of MatchFactRepository
 *
 * @author sr_hosseini <rassoul.hosseini at gmail.com>
 */
class MatchFactRepository extends Repository
{
    protected $entity = MatchFact::class;
}
