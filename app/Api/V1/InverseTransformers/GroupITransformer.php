<?php

namespace Tournament\Api\V1\InverseTransformers;

use Tournament\API\V1\InverseTransformers\BaseInverseTransformer;
use Tournament\Entities\Group;

/**
 * Description of GroupITransformer
 *
 * @author sr_hosseini <rassoul.hosseini at gmail.com>
 */
class GroupITransformer extends BaseInverseTransformer
{
    /**
     *
     * @param array $group
     * @return Group
     */
    public function transform(array $group)
    {
        $stage = $this->em->getReference(\Tournament\Entities\Stage::class, $group['stageId']);
        $maxSequenceNo = $this->em->getRepository(Group::class)
            ->maxSequenceNumber();

        return Group::getInstance()
            ->setName($group['name'])
            ->setSequenceNo($maxSequenceNo)
            ->setStage($stage);
    }
}
