<?php

namespace Tournament\API\V1\InverseTransformers;

use Doctrine\ORM\EntityManager;
use League\Fractal\TransformerAbstract;

/**
 * Description of BaseTransformer
 *
 * @author sr_hosseini <rassoul.hosseini at gmail.com>
 */
abstract class BaseInverseTransformer extends TransformerAbstract
{
    /**
     *
     * @var EntityManager
     */
    protected $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     *
     * @return \static
     */
    public static function newInstance(EntityManager $em)
    {
        return new static($em);
    }
}
