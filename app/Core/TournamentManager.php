<?php

namespace Tournament\Core;

use Tournament\Entities\Match;
use Tournament\Entities\Tournament;

/**
 * Description of TournamentManager
 *
 * @author sr_hosseini <rassoul.hosseini at gmail.com>
 */
final class TournamentManager
{

    /**
     *
     * @var Tournament
     */
    private $tournament;

    /**
     *
     * @param Match $tournament
     */
    public function __construct(Tournament $tournament)
    {
        $this->tournament = $tournament;
    }

    /**
     *
     * @param bool $isSingleStage
     * @return \self
     */
    public static function make($isSingleStage)
    {
        $tournament = Tournament::getInstance()
            ->setIsSingleStage($isSingleStage);

        if ($isSingleStage) {
            $this->addStage(\Tournament\Entities\Stage::getInstance()
                ->setHomeAndAway(false)
                ->setType(\Tournament\Entities\Stage::TYPE_LEAGUE));
        }

        return new self($tournament);
    }

    /**
     *
     * @return Tournament
     */
    public function getTournament()
    {
        return $this->tournament;
    }

    /**
     *
     * @param \Tournament\Entities\Stage $stage
     */
    public function addStage(\Tournament\Entities\Stage $stage)
    {
        $this->tournament->addStage($stage);
        return $stage;
    }

    /**
     *
     * @param \Tournament\Entities\Team $team
     */
    public function addTeam(\Tournament\Entities\Team $team)
    {
        $this->tournament->addTeam($team);
        if ($this->tournament->getStages()->count()) {
            $this->tournament->getStages()[0]->addTeam($team);
        }

        return $team;
    }

    /**
     *
     * @return \Tournament\Entities\Stage
     */
    public function addDefaultStage()
    {
        $stage = \Tournament\Entities\Stage::getInstance()
            ->setName('default')
            ->setHomeAndAway(false)
            ->setType(\Tournament\Entities\Stage::TYPE_LEAGUE);

        foreach ($this->tournament->getTeams() as $team) {
            $stage->addTeam($team);
        }

        $this->tournament->addStage($stage);

        return $stage;
    }
}
