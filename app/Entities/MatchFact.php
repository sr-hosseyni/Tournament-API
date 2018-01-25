<?php
namespace Tournament\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * MatchFact
 *
 * @ORM\Table(name="match_facts", indexes={@ORM\Index(name="me_player_score_match_id_foreign", columns={"match_id"})})
 * @ORM\Entity(repositoryClass="\Tournament\API\V1\Repositories\MatchFactRepository")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="match_event_type", type="integer")
 * @ORM\DiscriminatorMap(
 *      {
 *          0 = "\Tournament\Entities\MatchFact",
 *          1 = "\Tournament\Entities\MatchFacts\TimeBoundary",
 *          2 = "\Tournament\Entities\MatchFacts\PlayerScore",
 *          3 = "\Tournament\Entities\MatchFacts\Substitution"
 *      }
 * )
 */
class MatchFact
{
    use \Tournament\Helpers\HelperTraits\InstanceMaker;

    public static $TYPES = [
        MatchFact::class => 0,
        MatchFacts\TimeBoundary::class => 1,
        MatchFacts\PlayerScore::class => 2,
        MatchFacts\Substitution::class => 3
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
     * @var Match
     *
     * @ORM\ManyToOne(targetEntity="Match", inversedBy="facts")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="match_id", referencedColumnName="id", nullable=false)
     * })
     */
    private $match;

    /**
     * @var boolean
     *
     * @ORM\Column(name="set_number", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $setNumber;

    /**
     * @var integer
     *
     * @ORM\Column(name="time_offset", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $timeOffset;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set match
     *
     * @param Match $match
     *
     * @return MatchFact
     */
    public function setMatch(Match $match)
    {
        $this->match = $match;

        return $this;
    }

    /**
     * Get match
     *
     * @return Match
     */
    public function getMatch()
    {
        return $this->match;
    }

    /**
     * Set setNumber
     *
     * @param boolean $setNumber
     *
     * @return PlayerScore
     */
    public function setSetNumber($setNumber)
    {
        $this->setNumber = $setNumber;

        return $this;
    }

    /**
     * Get setNumber
     *
     * @return boolean
     */
    public function getSetNumber()
    {
        return $this->setNumber;
    }

    /**
     * Set timeOffset
     *
     * @param integer $timeOffset
     *
     * @return PlayerScore
     */
    public function setTimeOffset($timeOffset)
    {
        $this->timeOffset = $timeOffset;

        return $this;
    }

    /**
     * Get timeOffset
     *
     * @return integer
     */
    public function getTimeOffset()
    {
        return $this->timeOffset;
    }

    /**
     *
     * @return string
     */
    public function getFactType()
    {
        return (new \ReflectionClass($this))->getShortName();
    }

    /**
     *
     * @return string
     */
    public static function type()
    {
        return (new \ReflectionClass(static::class))->getShortName();
    }

    public function __toString()
    {
        return self::type();
    }
}

