<?php

namespace BMS\API\V1\Entities;

use BMS\Entities\Traits\Deletable;
use BMS\Entities\User as UserEntity;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity(repositoryClass="App\API\V1\Repositories\UserRepository")
 * @ORM\Table(name="tb_usr_user")
 */
class User extends UserEntity
{
    use Deletable;
}
