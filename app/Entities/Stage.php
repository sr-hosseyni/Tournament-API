<?php
namespace Tournament\Entities;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Tournament\Entities\Stage;
use Tournament\Entities\Team;
use Tournament\Entities\Tournament;

/**
 * Stage
 *
 * @ORM\Table(name="stage", indexes={@ORM\Index(name="stage_tournament_id_foreign", columns={"tournament_id"})})
 * @ORM\Entity
 */
class Stage
{
    use \Tournament\Helpers\HelperTraits\InstanceMaker;

    const TYPE_LEAGUE = 1;
    const TYPE_GROUP = 2;
    const TYPE_PLAY_OFF = 3;
    const TYPE_MANUAL = 4;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="sequence_no", type="integer", nullable=false, unique=false, options={"default" : 1})
     */
    private $sequenceNo = 1;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $name;

    /**
     * @var boolean
     *
     * @ORM\Column(name="home_and_away", type="boolean", precision=0, scale=0, nullable=false, unique=false)
     */
    private $homeAndAway;

    /**
     * @var boolean
     *
     * @ORM\Column(name="restrict_team_membership_in_groups", type="boolean", precision=0, scale=0, nullable=false, unique=false)
     */
    private $restrictTeamMembershipInGroups = true;

    /**
     * @var boolean
     *
     * @ORM\Column(name="type", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $type;

    /**
     * @var Tournament
     *
     * @ORM\ManyToOne(targetEntity="Tournament", inversedBy="stages")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tournament_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $tournament;

    /**
     * @var Collection|Team[]
     *
     * Owning Side
     *
     * @ORM\ManyToMany(targetEntity="Team", inversedBy="stages")
     * @ORM\JoinTable(name="stage_team",
     *   joinColumns={
     *     @ORM\JoinColumn(name="stage_id", referencedColumnName="id", nullable=true)
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="team_id", referencedColumnName="id", nullable=true)
     *   }
     * )
     */
    private $teams;

    /**
     * @var Group[]
     *
     * @ORM\OneToMany(targetEntity="Group", mappedBy="stage", cascade={"persist"})
     */
    private $groups;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->teams = new ArrayCollection();
        $this->groups = new ArrayCollection();
    }

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
     * Set sequenceNo
     *
     * @param integer $sequenceNo
     *
     * @return Stage
     */
    public function setSequenceNo($sequenceNo)
    {
        $this->sequenceNo = $sequenceNo;

        return $this;
    }

    /**
     * Get sequenceNo
     *
     * @return integer
     */
    public function getSequenceNo()
    {
        return $this->sequenceNo;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Stage
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set homeAndAway
     *
     * @param boolean $homeAndAway
     *
     * @return Stage
     */
    public function setHomeAndAway($homeAndAway)
    {
        $this->homeAndAway = $homeAndAway;

        return $this;
    }

    /**
     * Get homeAndAway
     *
     * @return boolean
     */
    public function getHomeAndAway()
    {
        return $this->homeAndAway;
    }

    /**
     * Set is restrictTeamMembershipInGroups or not
     *
     * @param boolean $restrictTeamMembershipInGroups
     *
     * @return Stage
     */
    public function setRestrictTeamMembershipInGroups($restrictTeamMembershipInGroups = true)
    {
        $this->restrictTeamMembershipInGroups = $restrictTeamMembershipInGroups;

        return $this;
    }

    /**
     * Get is restrictTeamMembershipInGroups or not
     *
     * @return boolean
     */
    public function getRestrictTeamMembershipInGroups()
    {
        return $this->restrictTeamMembershipInGroups;
    }

    /**
     * Set type
     *
     * @param boolean $type
     *
     * @return Stage
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

    /**
     * Set tournament
     *
     * @param Tournament $tournament
     *
     * @return Stage
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

    /**
     * Add team
     *
     * @param Team $team
     *
     * @return Stage
     */
    public function addTeam(Team $team)
    {
        $this->teams[] = $team;

        return $this;
    }

    /**
     * Set teams
     *
     * @param Team[] $teams
     *
     * @return Stage
     */
    public function setTeams(array $teams)
    {
        foreach ($teams as $team) {
            $this->teams[] = $team;
        }

        return $this;
    }

    /**
     * Remove team
     *
     * @param Team $team
     */
    public function removeTeam(Team $team)
    {
        $this->teams->removeElement($team);
    }

    /**
     * Get teams
     *
     * @return Collection|TEam[]
     */
    public function getTeams()
    {
        return $this->teams;
    }
    
    /**
     * Add group
     *
     * @param Group $group
     *
     * @return Tournament
     */
    public function addGroup(Group $group)
    {
        $this->groups[] = $group;

        return $this;
    }

    /**
     * Remove group
     *
     * @param Group $group
     */
    public function removeGroup(Group $group)
    {
        $this->groups->removeElement($group);
    }

    /**
     * Get groups
     *
     * @return Collection
     */
    public function getGroups()
    {
        return $this->groups;
    }
}

