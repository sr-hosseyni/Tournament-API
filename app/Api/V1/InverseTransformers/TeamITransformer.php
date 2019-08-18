<?php

namespace Tournament\Api\V1\InverseTransformers;

use Tournament\API\V1\InverseTransformers\BaseInverseTransformer;
use Tournament\Entities\Team;

/**
 * Description of TeamITransformer
 *
 * @author sr_hosseini <rassoul.hosseini at gmail.com>
 */
class TeamITransformer extends BaseInverseTransformer
{
    /**
     *
     * @param array $team
     * @return Tournament
     */
    public function transform(array $team)
    {
        return Team::getInstance()
            ->setName($team['name']);
    }
}
