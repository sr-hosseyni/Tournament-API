<?php
namespace Tournament\API\V1\Transformers;

use League\Fractal\TransformerAbstract;
use Tournament\Entities\Player;

/**
 * Description of PlayersTransformer
 *
 * @author sr_hosseini <rassoul.hosseini at gmail.com>
 */
class PlayersTransformer extends BaseTransformer
{


    /**
     *
     * @param Player[]|\Doctrine\ORM\PersistentCollection $players
     * @return array
     */
    public function transform($players)
    {
        $data = [];
        $playerTransformer = new PlayerTransformer();
        foreach ($players as $player) {
            $data[] = $playerTransformer->transform($player);
        }

        return $data;
    }
}
