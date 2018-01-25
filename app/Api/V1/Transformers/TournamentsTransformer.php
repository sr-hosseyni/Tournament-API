<?php
namespace Tournament\API\V1\Transformers;

use Illuminate\Database\Eloquent\Collection;
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
     * @param Tournament[]|Collection $tournaments
     * @return array
     */
    public function transform(array $tournaments)
    {
        $data = [];
        $matchTransformer = new TournamentTransformer();
        foreach ($tournaments as $tournament) {
            /* @var $tournament Tournament */
            $data[] = $matchTransformer->transform($tournament);
        }

        return $data;
    }
}
