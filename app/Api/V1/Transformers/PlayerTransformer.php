<?php
namespace Tournament\API\V1\Transformers;

use Tournament\API\V1\Transformers\UserTransformer;
use Tournament\Entities\Player;

/**
 * Description of PlayerTransformer
 *
 * @author sr_hosseini <rassoul.hosseini at gmail.com>
 */
class PlayerTransformer extends BaseTransformer
{
    /**
     *
     * @param Player $player
     * @return array
     */
    public function transform(Player $player)
    {
        return [
            'id' => $player->getId(),
            'img' => $player->getImg(),
            'abrv' => $player->getAbrv(),
            'user' => UserTransformer::getInstance()->transform($player->getUser())
        ];
    }
}
