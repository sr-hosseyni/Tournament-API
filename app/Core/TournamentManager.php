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
     * @param \Tournament\Entities\Struct\TournamentSetting $setting
     * @return \self
     */
    public static function make(\Tournament\Entities\Struct\TournamentSetting $setting)
    {
        $tournament = Tournament::getInstance()
            ->setName($setting->name);

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

    }
}
