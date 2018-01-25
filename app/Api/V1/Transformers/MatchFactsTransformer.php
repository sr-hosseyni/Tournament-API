<?php

namespace Tournament\API\V1\Transformers;

use Doctrine\ORM\PersistentCollection;
use Tournament\Entities\MatchFact;

/**
 * Description of MatchFactsTransformer
 *
 * @author sr_hosseini <rassoul.hosseini at gmail.com>
 */
class MatchFactsTransformer extends BaseTransformer
{
    /**
     *
     * @param MatchFact[]|PersistentCollection $facts
     * @return array
     */
    public function transform($facts)
    {
        $matchFactTransformer = MatchFactTransformer::getInstance();
        return array_map(function ($fact) use($matchFactTransformer) {
            return $matchFactTransformer->transform($fact);
        }, $facts->toArray());
    }
}
