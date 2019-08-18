<?php
namespace Tournament\API\V1\Transformers;

use Illuminate\Database\Eloquent\Collection;
use Tournament\Entities\Stage;

/**
 * Description of StagesTransformer
 *
 * @author sr_hosseini <rassoul.hosseini at gmail.com>
 */
class StagesTransformer extends BaseTransformer
{
    /**
     *
     * @param PersistentCollection|Stage[] $stages
     * @return array
     */
    public function transform($stages)
    {
        $data = [];
        $stageTransformer = new StageTransformer();
        foreach ($stages as $stage) {
            /* @var $match Match */
//            $data[$stage->getId()] = $stageTransformer->transform($stage);
            $data[] = $stageTransformer->transform($stage);
        }

        return $data;
    }
}
