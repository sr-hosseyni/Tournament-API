<?php

namespace Tournament\API\V1\Transformers;

use Tournament\Api\V1\InverseTransformers\MatchFactITransformer;
use Tournament\Entities\MatchFact;
use Tournament\Entities\MatchFacts\PlayerScore;
use Tournament\Entities\MatchFacts\TimeBoundary;

/**
 * Description of MatchFactTransformer
 *
 * @author sr_hosseini <rassoul.hosseini at gmail.com>
 */
class MatchFactTransformer extends BaseTransformer
{
    /**
     *
     * @param MatchFact $fact
     * @return array
     */
    public function transform(MatchFact $fact)
    {
        $type = lcfirst($fact->getFactType());
        $data = $this->{$type}($fact);

        return array_merge(
            $data,
            [
                'id' => $fact->getId(),
                'time' => $fact->getTimeOffset(),
                'setNumber' => $fact->getTimeOffset(),
                'match_id' => $fact->getMatch()->getId()
            ]
        );
    }

    /**
     *
     * @param PlayerScore $fact
     * @return array
     */
    private function playerScore(PlayerScore $fact)
    {
        return [
            'etype' => MatchFactITransformer::ETYPE_PLAYER_SCORE,
            'team_id' => $fact->getTeam()->getId(),
            'is_host' => $fact->getIsHost(),
            'player_id' => $fact->getPlayer() ? $fact->getPlayer()->getId() : null,
            'is_own_goal' => $fact->getIsOwnGoal()
        ];
    }

    /**
     *
     * @param TimeBoundary $fact
     * @return array
     */
    private function timeBoundary(TimeBoundary $fact)
    {
        return [
            'etype' => MatchFactITransformer::ETYPE_TIME_BOUNDARY,
            'type' => $fact->getType()
        ];
    }
}
