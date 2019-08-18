<?php

namespace Tournament\API\V1\Transformers;

use Tournament\Entities\Group;

/**
 * Description of GroupTransformer
 *
 * @author sr_hosseini <rassoul.hosseini at gmail.com>
 */
class GroupTransformer extends BaseTransformer
{
    /**
     *
     * @param Group $group
     * @return array
     */
    public function transform(Group $group)
    {
        return [
            'id' => $group->getId(),
            'name' => $group->getName(),
            'teams' => TeamsTransformer::getInstance()->transform($group->getTeams())
        ];
    }
}
