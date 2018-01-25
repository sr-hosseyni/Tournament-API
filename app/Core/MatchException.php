<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Tournament\Core;

use Tournament\Entities\MatchFact;
use Tournament\Entities\Statics\MatchStatus;

/**
 * Description of MatchException
 *
 * @author sr_hosseini <rassoul.hosseini at gmail.com>
 */
final class MatchException extends \Exception
{
    public static function addingInvalidFact(MatchFact $fact, $status)
    {
        return new self(sprintf(
            'Can not add fact [%s] while match is in status [%s]',
            $fact,
            isset(MatchStatus::$TITLES[$status]) ? MatchStatus::$TITLES[$status] : 'unknowen'
        ));
    }
}
