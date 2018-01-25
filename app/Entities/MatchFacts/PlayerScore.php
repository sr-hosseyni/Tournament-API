<?php
namespace Tournament\Entities\MatchFacts;

use Doctrine\ORM\Mapping as ORM;
use Tournament\Entities\MatchFact;
use Tournament\Entities\Player;
use Tournament\Entities\Team;


/**
 * PlayerScore
 *
 * @ORM\Table(name="me_player_score", indexes={
 *      @ORM\Index(name="me_player_score_team_id_foreign", columns={"team_id"}),
 *      @ORM\Index(name="me_player_score_player_id_foreign", columns={"player_id"})
 * })
 * @ORM\Entity
 */
class PlayerScore extends MatchFact
{
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
     * @ORM\Column(name="is_host", type="boolean", nullable=false, unique=false)
     */
    private $isHost;

    /**
     * @var Team
     *
     * @ORM\ManyToOne(targetEntity="Tournament\Entities\Team")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="team_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $team;

    /**
     * @var Player
     *
     * @ORM\ManyToOne(targetEntity="Tournament\Entities\Player")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="player_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $player;

    /**
     * @var boolean
     *
     * @ORM\Column(name="own_goal", type="boolean", nullable=false, unique=false)
     */
    private $ownGoal = false;

    /**
     * Set isHost
     *
     * @param boolean $isHost
     *
     * @return PlayerScore
     */
    public function setIsHost($isHost = true)
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
     * Set player
     *
     * @param Player $player
     *
     * @return PlayerScore
     */
    public function setPlayer(Player $player = null)
    {
        $this->player = $player;

        return $this;
    }

    /**
     * Get player
     *
     * @return Player
     */
    public function getPlayer()
    {
        return $this->player;
    }

    /**
     * Set team
     *
     * @param Team $team
     *
     * @return PlayerScore
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

    /**
     *
     * @return boolean
     */
    public function getIsOwnGoal()
    {
        return $this->ownGoal;
    }

    /**
     *
     * @param boolean $ownGoal
     * @return $this
     */
    public function setOwnGoal($ownGoal = true)
    {
        $this->ownGoal = $ownGoal;
        return $this;
    }
}

