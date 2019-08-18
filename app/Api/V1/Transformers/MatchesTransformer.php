<?php
namespace Tournament\API\V1\Transformers;

use Illuminate\Database\Eloquent\Collection;
use League\Fractal\TransformerAbstract;
use Tournament\Entities\Match;

/**
 * Description of MatchTransformer
 *
 * @author sr_hosseini <rassoul.hosseini at gmail.com>
 */
class MatchesTransformer extends BaseTransformer
{
    /**
     *
     * @param Match[]|Collection $matches
     * @return array
     */
    public function transform($matches)
    {
        $data = [];
        $matchTransformer = new MatchTransformer();
        foreach ($matches as $match) {
            /* @var $match Match */
            $data[] = $matchTransformer->transform($match);
        }

        return $data;
    }
}
