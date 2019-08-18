<?php
namespace Tournament\API\V1\Transformers;

use Doctrine\ORM\PersistentCollection;
use Tournament\Entities\Tournament;

/**
 * Description of TournamentsTransformer
 *
 * @author sr_hosseini <rassoul.hosseini at gmail.com>
 */
class TournamentsTransformer extends BaseTransformer
{
    /**
     *
     * @param Tournament[]|PersistentCollection $tournaments
     * @return array
     */
    public function transform($tournaments)
    {
        $data = [];
        $tournamentTransformer = new TournamentTransformer();
        foreach ($tournaments as $tournament) {
            /* @var $tournament Tournament */
            $data[] = $tournamentTransformer->transform($tournament);
        }

        return $data;
    }
}
