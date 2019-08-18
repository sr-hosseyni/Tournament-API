<?php

namespace Tournament\Api\V1\InverseTransformers;

use Tournament\API\V1\InverseTransformers\BaseInverseTransformer;
use Tournament\Entities\Stage;

/**
 * Description of StageITransformer
 *
 * @author sr_hosseini <rassoul.hosseini at gmail.com>
 */
class StageITransformer extends BaseInverseTransformer
{
    /**
     *
     * @param array $stage
     * @return Stage
     */
    public function transform(array $stage)
    {
        $tournament = $this->em->getReference(\Tournament\Entities\Tournament::class, $stage['tournamentId']);

        return Stage::getInstance()
            ->setName($stage['name'])
            ->setHomeAndAway($stage['homeAndAway'])
            ->setType($stage['type'])
            ->setTournament($tournament);
    }
}
