<?php
namespace Tournament\Entities\Statics;

use Doctrine\ORM\Mapping as ORM;

/**
 * MatchStatus
 *
 * ORM\Table(name="match_status", indexes={@ORM\Index(name="idx_match_status_title", columns={"title"})})
 * ORM\Entity
 */
final class MatchStatus
{
    // When match not started yet (just scheduled)
    const UNSTARTED = 1;

    // When match is playing in each of Sets
    const ONGOING = 2;

    // When match stoped between Sets
    const HALTING = 3;

    // When match successfully finished
    const FINISHED = 4;

    // When match canceled before starting
    const CANSELED = 5;

    // When match finished unsuccessfull
    const ABNORMAL = 6;

    // When match goes to timeout in a Set's duration
    const TIMEOUT = 7;

    static $TITLES = [
        self::UNSTARTED => 'unstarted',
        self::ONGOING => 'ongoing',
        self::HALTING => 'halting',
        self::FINISHED => 'finished',
        self::CANSELED => 'canseled',
        self::ABNORMAL => 'abnormal',
        self::TIMEOUT => 'timeout'
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
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $title;

    /**
     * @var int
     *
     * @ORM\Column(name="type", type="integer", length=1, nullable=true, unique=false)
     */
    private $type;

    /**
     * @var CompetitionType
     *
     * @ORM\ManyToOne(targetEntity="CompetitionType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     * })
     */
    private $competitionType;

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
     * Set title
     *
     * @param string $title
     *
     * @return MatchStatus
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }
}

