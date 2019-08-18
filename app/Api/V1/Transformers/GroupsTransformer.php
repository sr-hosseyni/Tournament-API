<?php
namespace Tournament\API\V1\Transformers;

use Doctrine\ORM\PersistentCollection;
use Tournament\Entities\Group;

/**
 * Description of GroupsTransformer
 *
 * @author sr_hosseini <rassoul.hosseini at gmail.com>
 */
class GroupsTransformer extends BaseTransformer
{
    /**
     *
     * @param PersistentCollection|Group[] $groups
     * @return array
     */
    public function transform($groups)
    {
        $data = [];
        $groupTransformer = new GroupTransformer();
        foreach ($groups as $group) {
//            $data[$group->getId()] = $groupTransformer->transform($group);
            $data[] = $groupTransformer->transform($group);
        }

        return $data;
    }
}
