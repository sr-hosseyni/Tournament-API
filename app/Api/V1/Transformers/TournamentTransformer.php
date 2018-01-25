<?php

namespace Tournament\API\V1\Transformers;

use Tournament\Entities\Tournament;

/**
 * Description of MatchTransformer
 *
 * @author sr_hosseini <rassoul.hosseini at gmail.com>
 */
class TournamentTransformer extends BaseTransformer
{
    /**
     *
     * @param Tournament $tournament
     * @return array
     */
    public function transform(Tournament $tournament)
    {
        return [
            'id' => $tournament->getId(),
            'name' => $tournament->getName(),
            'type' => $tournament->getType(),
            'logo' => $tournament->getLogo(),
            'platform' => $tournament->getPlatform()
        ];
    }
}
