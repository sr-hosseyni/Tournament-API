<?php
namespace Tournament\Entities;

use Doctrine\ORM\Mapping as ORM;
use Tournament\Helpers\HelperTraits\InstanceMaker;;

/**
 * MatchResult
 *
 * @ORM\Table(name="match_result",
 *      uniqueConstraints={
 *          @ORM\UniqueConstraint(name="match_result_match_id_team_id_set_number_unique", columns={"match_id", "team_id", "set_number"}),
 *          @ORM\UniqueConstraint(name="match_result_match_id_isHost_set_number_unique", columns={"match_id", "is_host", "set_number"})
 *      }, indexes={
 *          @ORM\Index(name="match_result_team_id_foreign", columns={"team_id"}),
 *          @ORM\Index(name="IDX_B20538122ABEACD6", columns={"match_id"})
 * })
 * @ORM\Entity
 */
class MatchResult
{
    use InstanceMaker;

    const OVERAL_RESULT_SET_NUMBER = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start_at", type="datetime", precision=0, scale=0, nullable=true, unique=false)
     */
    private $startAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="finish_at", type="datetime", precision=0, scale=0, nullable=true, unique=false)
     */
    private $finishAt;

    /**
     * @var integer
     *
     * @ORM\Column(name="is_host", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $isHost;

    /**
     * @var integer
     *
     * @ORM\Column(name="set_number", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $setNumber;

    /**
     * @var integer
     *
     * @ORM\Column(name="goal_scores", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $goalScores = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="goal_againts", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $goalAgaints = 0;

    /**
     * @var Match
     *
     * @ORM\ManyToOne(targetEntity="Match", inversedBy="results")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="match_id", referencedColumnName="id", nullable=false)
     * })
     */
    private $match;

    /**
     * @var Team
     *
     * @ORM\ManyToOne(targetEntity="Team")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="team_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $team;


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
     * Set startAt
     *
     * @param \DateTime $startAt
     *
     * @return MatchResult
     */
    public function setStartAt($startAt)
    {
        $this->startAt = $startAt;

        return $this;
    }

    /**
     * Get startAt
     *
     * @return \DateTime
     */
    public function getStartAt()
    {
        return $this->startAt;
    }

    /**
     * Set finishAt
     *
     * @param \DateTime $finishAt
     *
     * @return MatchResult
     */
    public function setFinishAt($finishAt)
    {
        $this->finishAt = $finishAt;

        return $this;
    }

    /**
     * Get finishAt
     *
     * @return \DateTime
     */
    public function getFinishAt()
    {
        return $this->finishAt;
    }

    /**
     * Set isHost
     *
     * @param boolean $isHost
     *
     * @return MatchResult
     */
    public function setIsHost($isHost)
    {
        $this->isHost = $isHost;

        return $this;
    }

    /**
     * Get isHost
     *
     * @return boolean
     */
    public function getIsHost()
    {
        return $this->isHost;
    }

    /**
     * Set setNumber
     *
     * @param boolean $setNumber
     *
     * @return MatchResult
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
     * Set goalScores
     *
     * @param integer $goalScores
     *
     * @return MatchResult
     */
    public function setGoalScores($goalScores)
    {
        $this->goalScores = $goalScores;

        return $this;
    }

    /**
     * Increment goalScores
     *
     * @return MatchResult
     */
    public function incGoalScores()
    {
        $this->goalScores++;

        return $this;
    }

    /**
     * Get goalScores
     *
     * @return integer
     */
    public function getGoalScores()
    {
        return $this->goalScores;
    }

    /**
     * Set goalAgaints
     *
     * @param integer $goalAgaints
     *
     * @return MatchResult
     */
    public function setGoalAgaints($goalAgaints)
    {
        $this->goalAgaints = $goalAgaints;

        return $this;
    }

    /**
     * Increment goalAgaints
     *
     * @return MatchResult
     */
    public function incGoalAgaints()
    {
        $this->goalAgaints++;

        return $this;
    }

    /**
     * Get goalAgaints
     *
     * @return integer
     */
    public function getGoalAgaints()
    {
        return $this->goalAgaints;
    }

    /**
     * Set match
     *
     * @param Match $match
     *
     * @return MatchResult
     */
    public function setMatch(Match $match = null)
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
     * Set team
     *
     * @param Team $team
     *
     * @return MatchResult
     */
    public function setTeam(Team $team = null)
    {
        $this->team = $team;

        return $this;
    }

    /**
     * Get team
     *
     * @return Team
     */
    public function getTeam()
    {
        return $this->team;
    }
}

