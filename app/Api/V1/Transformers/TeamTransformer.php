<?php

namespace Tournament\API\V1\Transformers;

use League\Fractal\TransformerAbstract;
use Tournament\Entities\Team;

/**
 * Description of TeamTransformer
 *
 * @author sr_hosseini <rassoul.hosseini at gmail.com>
 */
class TeamTransformer extends BaseTransformer
{
    /**
     *
     * @param Team $team
     * @return array
     */
    public function transform(Team $team)
    {
        return [
            'id' => $team->getId(),
            'name' => $team->getName(),
            'abrv' => $team->getAbrv(),
            'players' => PlayersTransformer::getInstance()->transform($team->getPlayers()),
            'logo' => $team->getLogo()
        ];
    }
}
