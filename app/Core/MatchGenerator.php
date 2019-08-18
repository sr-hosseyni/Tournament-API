<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Tournament\Core;

use Tournament\Entities\Group;
use Tournament\Entities\Match;

/**
 * Description of MatchGenerator
 *
 * @author sr_hosseini <rassoul.hosseini at gmail.com>
 */
class MatchGenerator
{

    private static $templates = [
        1 => [],
        2 => [[0, 1]],
        3 => [[1, 2], [2, 0], [0, 1]],
        4 => [[1, 2], [3, 0], [0, 1], [2, 3], [1, 3], [2, 0]]
    ];

    public static function generateMatches(Group $group)
    {
        $teams = $group->getTeams();
        foreach (self::$templates[$group->getTeams()->count()] as $tpl) {
            $match = MatchManager::make(
                    $group, $teams[$tpl[0]], $teams[$tpl[1]], new \DateTime(strtotime('tommorow'))
                )->getMatch();

            $group->addMatch($match);
        }

        return $group;
    }
}
