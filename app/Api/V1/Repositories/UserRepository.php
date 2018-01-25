<?php

namespace Tournament\API\V1\Repositories;

use Tournament\API\V1\Entities\User;
use Tournament\Repositories\Repository;

class UserRepository extends Repository
{

    protected $entity = User::class;
}
