<?php
namespace Tournament\Entities;

use Doctrine\ORM\Mapping as ORM;
use Tournament\Helpers\HelperTraits\InstanceMaker;

/**
 * MatchPoints
 *
 * @ORM\Table(name="match_point", indexes={
 *      @ORM\Index(name="match_points_match_id_foreign", columns={"match_id"}),
 *      @ORM\Index(name="match_points_team_id_foreign", columns={"team_id"})
 * })
 * @ORM\Entity
 */
class MatchPoint
{
    use InstanceMaker;

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
     * @ORM\Column(name="is_host", type="boolean", precision=0, scale=0, nullable=false, unique=false)
     */
    private $isHost;

    /**
     * @var boolean
     *
     * @ORM\Column(name="points", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $points;

    /**
     * @var boolean
     *
     * @ORM\Column(name="win", type="boolean", precision=0, scale=0, nullable=false, unique=false)
     */
    private $win;

    /**
     * @var boolean
     *
     * @ORM\Column(name="loss", type="boolean", precision=0, scale=0, nullable=false, unique=false)
     */
    private $loss;

    /**
     * @var boolean
     *
     * @ORM\Column(name="draw", type="boolean", precision=0, scale=0, nullable=false, unique=false)
     */
    private $draw;

    /**
     * @var Match
     *
     * @ORM\ManyToOne(targetEntity="Match", inversedBy="points")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="match_id", referencedColumnName="id", nullable=true)
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
     * Set isHost
     *
     * @param boolean $isHost
     *
     * @return MatchPoints
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
     * Set points
     *
     * @param int $points
     *
     * @return MatchPoints
     */
    public function setPoints($points)
    {
        $this->points = $points;

        return $this;
    }

    /**
     * Get points
     *
     * @return int
     */
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * Set win
     *
     * @param boolean $win
     *
     * @return MatchPoint
     */
    public function setWin($win)
    {
        $this->win = $win;

        return $this;
    }

    /**
     * Get win
     *
     * @return boolean
     */
    public function getWin()
    {
        return $this->win;
    }

    /**
     * Set loss
     *
     * @param boolean $loss
     *
     * @return MatchPoint
     */
    public function setLoss($loss)
    {
        $this->loss = $loss;

        return $this;
    }

    /**
     * Get loss
     *
     * @return boolean
     */
    public function getLoss()
    {
        return $this->loss;
    }

    /**
     * Set draw
     *
     * @param boolean $draw
     *
     * @return MatchPoint
     */
    public function setDraw($draw)
    {
        $this->draw = $draw;

        return $this;
    }

    /**
     * Get draw
     *
     * @return boolean
     */
    public function getDraw()
    {
        return $this->draw;
    }

    /**
     * Set match
     *
     * @param Match $match
     *
     * @return MatchPoint
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
     * @return MatchPoint
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

