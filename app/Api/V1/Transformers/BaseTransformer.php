<?php
namespace Tournament\API\V1\Transformers;

use League\Fractal\TransformerAbstract;
use Tournament\Helpers\HelperTraits\InstanceMaker;

/**
 * Description of BaseTransformer
 *
 * @author sr_hosseini <rassoul.hosseini at gmail.com>
 */
abstract class BaseTransformer extends TransformerAbstract
{
    use InstanceMaker;
}
