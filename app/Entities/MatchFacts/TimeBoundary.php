<?php

namespace Tournament\Entities\MatchFacts;

use Doctrine\ORM\Mapping as ORM;
use Tournament\Entities\MatchFact;

/**
 * TimeBoundary
 *
 * @ORM\Table(name="me_time_boundary", indexes={})
 *
 * @ORM\Entity
 */
class TimeBoundary extends MatchFact
{
    const TYPE_START = 1;
    const TYPE_FINISH = 2;

    /**
     * START TIMEOUT
     */
    const TYPE_PAUSE = 3;

    /**
     * FINISH TIMEOUT
     */
    const TYPE_RESUME = 4;

    static $TYPE = [
        self::TYPE_START => 'start',
        self::TYPE_FINISH => 'finish',
        self::TYPE_PAUSE => 'pause',
        self::TYPE_RESUME => 'resume'
    ];

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var boolean
     *
     * @ORM\Column(name="type", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $type;

    public function __construct()
    {
        // time offset for start events is 0, but it must set for finish,pause,resume
        $this->setTimeOffset(0);
    }

    /**
     * Set type
     *
     * @param boolean $type
     *
     * @return TimeBoundary
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return boolean
     */
    public function getType()
    {
        return $this->type;
    }

    public function __toString()
    {
        return parent::__toString() . '::' . self::$TYPE[$this->getType()];
    }
}

