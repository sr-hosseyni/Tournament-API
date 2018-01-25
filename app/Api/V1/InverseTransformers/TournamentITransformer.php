<?php

namespace Tournament\Api\V1\InverseTransformers;

use Tournament\API\V1\InverseTransformers\BaseInverseTransformer;
use Tournament\Entities\Tournament;

/**
 * Description of TournamentITransformer
 *
 * @author sr_hosseini <rassoul.hosseini at gmail.com>
 */
class TournamentITransformer extends BaseInverseTransformer
{
    /**
     *
     * @param array $tournament
     * @return Tournament
     */
    public function transform(array $tournament)
    {
        $maxSequenceNo = $this->em->getRepository(Tournament::class)
            ->maxSequenceNumber();

        return Tournament::getInstance()
            ->setName($tournament['name'])
            ->setPlatform($tournament['platform'])
            ->setType($tournament['type'])
            ->setLogo($tournament['logo'])
            ->setSequenceNo($maxSequenceNo + 1);
    }
}
