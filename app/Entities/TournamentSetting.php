<?php
namespace Tournament\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * TournamentSetting
 */
class TournamentSetting
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
     * @ORM\Column(name="mode", type="boolean", precision=0, scale=0, nullable=false, unique=false)
     */
    private $mode;

    /**
     * @var boolean
     *
     * @ORM\Column(name="match_referre", type="boolean", precision=0, scale=0, nullable=false, unique=false)
     */
    private $matchReferre;

    /**
     * @var boolean
     *
     * @ORM\Column(name="team_members_count", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $teamMembersCount;

    /**
     * @var boolean
     *
     * @ORM\Column(name="has_invitation", type="boolean", precision=0, scale=0, nullable=false, unique=false)
     */
    private $hasInvitation;

    /**
     * @var boolean
     *
     * @ORM\Column(name="has_registration", type="boolean", precision=0, scale=0, nullable=false, unique=false)
     */
    private $hasRegistration;

    /**
     * @var Tournament
     *
     * @ORM\ManyToOne(targetEntity="Tournament")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tournament_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $tournament;


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
     * Set mode
     *
     * @param boolean $mode
     *
     * @return TournamentSetting
     */
    public function setMode($mode)
    {
        $this->mode = $mode;

        return $this;
    }

    /**
     * Get mode
     *
     * @return boolean
     */
    public function getMode()
    {
        return $this->mode;
    }

    /**
     * Set matchReferre
     *
     * @param boolean $matchReferre
     *
     * @return TournamentSetting
     */
    public function setMatchReferre($matchReferre)
    {
        $this->matchReferre = $matchReferre;

        return $this;
    }

    /**
     * Get matchReferre
     *
     * @return boolean
     */
    public function getMatchReferre()
    {
        return $this->matchReferre;
    }

    /**
     * Set teamMembersCount
     *
     * @param boolean $teamMembersCount
     *
     * @return TournamentSetting
     */
    public function setTeamMembersCount($teamMembersCount)
    {
        $this->teamMembersCount = $teamMembersCount;

        return $this;
    }

    /**
     * Get teamMembersCount
     *
     * @return boolean
     */
    public function getTeamMembersCount()
    {
        return $this->teamMembersCount;
    }

    /**
     * Set hasInvitation
     *
     * @param boolean $hasInvitation
     *
     * @return TournamentSetting
     */
    public function setHasInvitation($hasInvitation)
    {
        $this->hasInvitation = $hasInvitation;

        return $this;
    }

    /**
     * Get hasInvitation
     *
     * @return boolean
     */
    public function getHasInvitation()
    {
        return $this->hasInvitation;
    }

    /**
     * Set hasRegistration
     *
     * @param boolean $hasRegistration
     *
     * @return TournamentSetting
     */
    public function setHasRegistration($hasRegistration)
    {
        $this->hasRegistration = $hasRegistration;

        return $this;
    }

    /**
     * Get hasRegistration
     *
     * @return boolean
     */
    public function getHasRegistration()
    {
        return $this->hasRegistration;
    }

    /**
     * Set tournament
     *
     * @param Tournament $tournament
     *
     * @return TournamentSetting
     */
    public function setTournament(Tournament $tournament = null)
    {
        $this->tournament = $tournament;

        return $this;
    }

    /**
     * Get tournament
     *
     * @return Tournament
     */
    public function getTournament()
    {
        return $this->tournament;
    }
}

