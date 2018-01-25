<?php

namespace Tournament\Api\V1\InverseTransformers;

use Tournament\API\V1\InverseTransformers\BaseInverseTransformer;
use Tournament\Entities\Match;
use Tournament\Entities\MatchFact;
use Tournament\Entities\MatchFacts\PlayerScore;
use Tournament\Entities\MatchFacts\TimeBoundary;
use Tournament\Entities\Player;
use Tournament\Entities\Team;

/**
 * Description of MatchTransformer
 *
 * @author sr_hosseini <rassoul.hosseini at gmail.com>
 */
class MatchFactITransformer extends BaseInverseTransformer
{
    const ETYPE_PLAYER_SCORE = 1;
    const ETYPE_TIME_BOUNDARY = 2;
    const ETYPE_SUBSTITUTION = 3;


//    // Player Oriented Events
//    const ETYPE_PLAYER_GOAL = 1;
//    const ETYPE_PLAYER_YELLOWCARD = 3;
//    const ETYPE_PLAYER_REDCARD = 4;
//    const ETYPE_PLAYER_SUB_OFF = 5;
//    const ETYPE_PLAYER_SUB_ON = 6;
//
//    // Time Oriented Events
//    const ETYPE_TIME_START = 10;
//    const ETYPE_TIME_FINISH = 11;
//    const ETYPE_TIME_PAUSE = 12;
//    const ETYPE_TIME_RESUME = 13;

    /**
     *
     * @param array $matchFact
     * @return MatchFact
     */
    public function transform(array $matchFact)
    {
        switch ($matchFact['etype']) {
            case self::ETYPE_PLAYER_SCORE:
                return $this->playerScores($matchFact);

            case self::ETYPE_TIME_BOUNDARY;
                return $this->timeBoundary($matchFact);
        }
    }

    private function playerScores(array $data)
    {
        $playerScore = new PlayerScore();

        /**
         * @todo entityManager::getResource make problem when a property of match entity is set, it does not get persisted
         * There is a difference between (finding a entity) and (getResource and then retrieve it)
         */
        $playerScore
//            ->setMatch($this->em->getReference(Match::class, $data['match_id']))
            ->setMatch($this->em->find(Match::class, $data['match_id']))
            ->setPlayer($this->em->getReference(Player::class, $data['player_id']))
            ->setTimeOffset($data['time'])
            ->setSetNumber($data['set_number'])
            ->setTeam($this->em->getReference(Team::class, $data['team_id']))
            ->setIsHost($data['is_host'])
            ->setOwnGoal($data['is_own_goal']);

        return $playerScore;
    }

    private function timeBoundary(array $data)
    {
        $timeBoundary = new TimeBoundary();

        $timeBoundary
            ->setMatch($this->em->find(Match::class, $data['match_id']))
            ->setTimeOffset($data['time'])
            ->setSetNumber($data['set_number'])
            ->setType($data['type']);

        return $timeBoundary;
    }
}
