<?php

namespace Tournament\Core;

use Tournament\Entities\Group;
use Tournament\Entities\Match;
use Tournament\Entities\MatchFact;
use Tournament\Entities\MatchFacts\PlayerScore;
use Tournament\Entities\MatchFacts\TimeBoundary;
use Tournament\Entities\MatchPoint;
use Tournament\Entities\MatchResult;
use Tournament\Entities\Statics\MatchStatus;
use Tournament\Entities\Team;

/**
 * Description of MatchService
 *
 * @author sr_hosseini <rassoul.hosseini at gmail.com>
 */
final class MatchManager
{

    /**
     *
     * @var Match
     */
    private $match;

    /**
     *
     * @param Match $match
     */
    public function __construct(Match $match)
    {
        $this->match = $match;
    }

    /**
     *
     * @param Group $group
     * @param Team $homeTeam
     * @param Team $awayTeam
     * @param \DateTime $shcedule
     * @return \self
     */
    public static function make(Group $group, Team $homeTeam, Team $awayTeam, \DateTime $shcedule)
    {
        $match = Match::getInstance()
            ->setStatus(MatchStatus::UNSTARTED)
            ->setGroup($group)
            ->setHomeTeam($homeTeam)
            ->setAwayTeam($awayTeam)
            ->setSchedule($shcedule);

        return new self($match);
    }

    /**
     *
     * @return Match
     */
    public function getMatch()
    {
        return $this->match;
    }

    /**
     *
     * @param MatchFact $fact
     * @return $this
     */
    public function addFact(MatchFact $fact)
    {
        switch ($fact->getFactType()) {
            case PlayerScore::type():
                $this->playerScore($fact);
                break;

            case TimeBoundary::type():
                $this->timeBoundary($fact);
                break;
        }

        $this->match->addFact($fact);

        return $this;
    }

    private function playerScore(PlayerScore $playerScore)
    {
        if ($this->match->getStatus() !== MatchStatus::ONGOING) {
            throw MatchException::addingInvalidFact($playerScore, $this->match->getStatus());
        }

        $playerScore->setSetNumber(1);
        if ($playerScore->getIsHost()) {
            $this->match->getOveralResult()->incGoalScores();
        } else {
            $this->match->getOveralResult()->incGoalAgaints();
        }
    }

    private function timeBoundary(TimeBoundary $boundary)
    {
        switch ($boundary->getType()) {
            case TimeBoundary::TYPE_START:
                $this->start($boundary);
                break;

            case TimeBoundary::TYPE_FINISH:
                $this->finish($boundary);
                break;

            case TimeBoundary::TYPE_PAUSE:
                $this->pause($boundary);
                break;

            case TimeBoundary::TYPE_RESUME:
                $this->resume($boundary);
                break;
        }
    }

    private function start(TimeBoundary $boundary)
    {
        if (!in_array($this->match->getStatus(), [MatchStatus::UNSTARTED, MatchStatus::HALTING])) {
            throw MatchException::addingInvalidFact($boundary, $this->match->getStatus());
        }
        $boundary->setSetNumber(1);

        // Total Result (Sum of all results)
        $this->match->addResult(
            MatchResult::getInstance()
                ->setSetNumber(MatchResult::OVERAL_RESULT_SET_NUMBER)
                ->setMatch($this->match)
                ->setStartAt(new \DateTime())
        );

        // First Set Result for HomeTeam
        $this->match->addResult(
            MatchResult::getInstance()
                ->setMatch($this->match)
                ->setSetNumber(1)
                ->setTeam($this->match->getHomeTeam())
                ->setIsHost(true)
                ->setStartAt(new \DateTime())
        );

        // First Set Result for AwayTeam
        $this->match->addResult(
            MatchResult::getInstance()
                ->setMatch($this->match)
                ->setSetNumber(1)
                ->setTeam($this->match->getAwayTeam())
                ->setIsHost(false)
                ->setStartAt(new \DateTime())
        );

        $this->match->setStatus(MatchStatus::ONGOING);
    }

    private function finish(TimeBoundary $boundary)
    {
        if ($this->match->getStatus() !== MatchStatus::ONGOING) {
            throw MatchException::addingInvalidFact($boundary, $this->match->getStatus());
        }

        $boundary->setSetNumber(1);
        $this->match->setStatus(MatchStatus::FINISHED);

        $goalsDiff = $this->match->getOveralResult()->getGoalScores() - $this->match->getOveralResult()->getGoalAgaints();

        $this->match->addPoint(
            MatchPoint::getInstance()
                ->setMatch($this->match)
                ->setIsHost(true)
                ->setTeam($this->match->getHomeTeam())
                ->setWin($goalsDiff > 0)
                ->setDraw($goalsDiff == 0)
                ->setLoss($goalsDiff < 0)
                ->setPoints($goalsDiff >= 0 ? $goalsDiff > 0 ? 3 : 1 : 0)
        );

        $this->match->addPoint(
            MatchPoint::getInstance()
                ->setMatch($this->match)
                ->setIsHost(false)
                ->setTeam($this->match->getAwayTeam())
                ->setWin($goalsDiff < 0)
                ->setDraw($goalsDiff == 0)
                ->setLoss($goalsDiff > 0)
                ->setPoints($goalsDiff <= 0 ? $goalsDiff < 0 ? 3 : 1 : 0)
        );
    }

    private function pause(TimeBoundary $boundary)
    {
        if ($this->match->getStatus() !== MatchStatus::ONGOING) {
            throw MatchException::addingInvalidFact($boundary, $this->match->getStatus());
        }

        $boundary->setSetNumber(1);
        $this->match->setStatus(MatchStatus::TIMEOUT);
    }

    private function resume(TimeBoundary $boundary)
    {
        if ($this->match->getStatus() !== MatchStatus::TIMEOUT) {
            throw MatchException::addingInvalidFact($boundary, $this->match->getStatus());
        }

        $boundary->setSetNumber(1);
        $this->match->setStatus(MatchStatus::ONGOING);
    }
}
