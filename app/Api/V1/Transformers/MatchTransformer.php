<?php

namespace Tournament\API\V1\Transformers;

use Tournament\Entities\Match;
use Tournament\Entities\MatchResult;

/**
 * Description of MatchTransformer
 *
 * @author sr_hosseini <rassoul.hosseini at gmail.com>
 */
class MatchTransformer extends BaseTransformer
{
    const ETYPE_GOAL = 1;
    const ETYPE_OWNGOAL = 2;
    const ETYPE_YELLOWCARD = 3;
    const ETYPE_REDCARD = 4;
    const ETYPE_SUBSTITUTION = 5;

    /**
     *
     * @param Match $match
     * @return array
     */
    public function transform(Match $match)
    {
        $results = [];

        if ($match->getOveralResult()) {
            $results[] = [
                'set_number' => $match->getOveralResult()->getSetNumber(),
                'goals_for' => [
                    $match->getHomeTeam()->getId() => $match->getOveralResult()->getGoalScores(),
                    $match->getAwayTeam()->getId() => $match->getOveralResult()->getGoalAgaints()
                ]
            ];
        }

//        foreach ($match->getResults() as $result) {
//            if ($result->getSetNumber() == MatchResult::OVERAL_RESULT_SET_NUMBER) {
//                continue;
//            }
//
//            if (isset($results[$result->getSetNumber()])) {
//                $results[$result->getSetNumber()]['goalsFor'][$result->getTeam()->getId()] = $result->getGoalScores();
//            } else {
//                $results[$result->getSetNumber()] = [
//                    'set_number' => $result->getSetNumber(),
//                    'goals_for' => [$result->getTeam()->getId() => $result->getGoalScores()]
//                ];
//            }
//
//        }

        $teamTrasformer = new TeamTransformer();

        return [
            'id' => $match->getId(),
            'teams' => [
                $teamTrasformer->transform($match->getHomeTeam()),
                $teamTrasformer->transform($match->getAwayTeam()),
            ],
            'results' => $results,
            'events' => MatchFactsTransformer::getInstance()->transform($match->getFacts()),
            'status' => $match->getStatus(),
            'schedule' => $match->getSchedule()
        ];
    }
}
