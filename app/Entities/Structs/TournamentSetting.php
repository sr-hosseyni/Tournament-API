<?php
namespace Tournament\Entities\Struct;

use Tournament\Helpers\HelperTraits\InstanceMaker;

/**
 * TournamentSetting
 */
class TournamentSetting
{
    use InstanceMaker;

    /**
     *
     * @var string
     */
    public $name;

    /**
     *
     * @var boolean
     */
    public $isSingleStage;
}

