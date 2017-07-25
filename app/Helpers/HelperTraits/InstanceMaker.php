<?php
namespace BMS\Helpers\HelperTraits;

/**
 * Description of InstanceMaker
 *
 * @author sr_hosseini <rassoul.hosseini at gmail.com>
 */
trait InstanceMaker
{
    public static function getInstance()
    {
        return new static;
    }
}
