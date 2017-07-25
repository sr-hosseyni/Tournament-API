<?php

namespace BMS\API\V1\Repositories;

use BMS\Repositories\Repository;

class UserRepository extends Repository
{

    protected $entity = \BMS\API\V1\Entities\User::class;
}
