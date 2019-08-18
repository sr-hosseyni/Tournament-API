<?php
namespace Tournament\API\V1\Transformers;

use Doctrine\ORM\PersistentCollection;
use Tournament\Entities\Team;

/**
 * Description of TeamsTransformer
 *
 * @author sr_hosseini <rassoul.hosseini at gmail.com>
 */
class TeamsTransformer extends BaseTransformer
{
    /**
     *
     * @param Team[]|PersistentCollection $teams
     * @return array
     */
    public function transform($teams)
    {
        $data = [];
        $teamTransformer = new TeamTransformer();
        foreach ($teams as $team) {
            $data[] = $teamTransformer->transform($team);
        }

        return $data;
    }
}
