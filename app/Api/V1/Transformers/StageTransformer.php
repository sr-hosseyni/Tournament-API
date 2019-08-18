<?php

namespace Tournament\API\V1\Transformers;

use Tournament\Entities\Stage;

/**
 * Description of StageTransformer
 *
 * @author sr_hosseini <rassoul.hosseini at gmail.com>
 */
class StageTransformer extends BaseTransformer
{
    /**
     *
     * @param Stage $stage
     * @return array
     */
    public function transform(Stage $stage)
    {
        return [
            'id' => $stage->getId(),
            'name' => $stage->getName(),
            'groups' => GroupsTransformer::getInstance()->transform($stage->getGroups()),
            'teams' => TeamsTransformer::getInstance()->transform($stage->getTeams())
        ];
    }
}
