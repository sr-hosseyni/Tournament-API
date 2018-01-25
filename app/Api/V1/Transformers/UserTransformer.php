<?php

namespace Tournament\API\V1\Transformers;

use App\API\V1\Entities\User as Entity;
use Tournament\API\V1\Transformers\BaseTransformer;
use Tournament\Entities\User;

class UserTransformer extends BaseTransformer
{
    /**
     * @param Entity $entity
     *
     * @return array
     */
    public function transform(User $entity)
    {
        return [
            'id' => $entity->getId(),
            'fname' => $entity->getFname(),
            'lname' => $entity->getLname(),
            'email' => $entity->getEmail(),
        ];
    }


}
