<?php
namespace Tournament\Entities;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Team
 *
 * @ORM\Table(name="team", indexes={@ORM\Index(name="team_tournament_id_foreign", columns={"tournament_id"})})
 * @ORM\Entity
 */
class Team
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="abrv", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $abrv;

    /**
     * @var string
     *
     * @ORM\Column(name="logo", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $logo;

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
     * @var Collection|Stage[]
     *
     * @ORM\ManyToMany(targetEntity="Stage", mappedBy="teams")
     */
    private $stages;

    /**
     * @var Collection|Group[]
     *
     * @ORM\ManyToMany(targetEntity="Group", mappedBy="teams")
     */
    private $groups;

    /**
     * @var Collection|Player[]
     *
     * @ORM\ManyToMany(targetEntity="Player", inversedBy="teams")
     * @ORM\JoinTable(name="player_team",
     *   joinColumns={
     *     @ORM\JoinColumn(name="team_id", referencedColumnName="id", nullable=true)
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="player_id", referencedColumnName="id", nullable=true)
     *   }
     * )
     */
    private $players;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->stages = new ArrayCollection();
        $this->groups = new ArrayCollection();
        $this->players = new ArrayCollection();
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
     * Set name
     *
     * @param string $name
     *
     * @return Team
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
     * Set abrv
     *
     * @param string $abrv
     *
     * @return Team
     */
    public function setAbrv($abrv)
    {
        $this->abrv = $abrv;

        return $this;
    }

    /**
     * Get abrv
     *
     * @return string
     */
    public function getAbrv()
    {
        return $this->abrv;
    }

    /**
     * Set logo
     *
     * @param string $logo
     *
     * @return Team
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Get logo
     *
     * @return string
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Set tournament
     *
     * @param Tournament $tournament
     *
     * @return Team
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
     * Add stage
     *
     * @param Stage $stage
     *
     * @return Team
     */
    public function addStage(Stage $stage)
    {
        $this->stages[] = $stage;

        return $this;
    }

    /**
     * Remove stage
     *
     * @param Stage $stage
     */
    public function removeStage(Stage $stage)
    {
        $this->stages->removeElement($stage);
    }

    /**
     * Get stages
     *
     * @return Collection
     */
    public function getStages()
    {
        return $this->stages;
    }

    /**
     * Add group
     *
     * @param Group $group
     *
     * @return Team
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

    /**
     * Add player
     *
     * @param Player $player
     *
     * @return Team
     */
    public function addPlayer(Player $player)
    {
        $this->players[] = $player;

        return $this;
    }

    /**
     * Remove player
     *
     * @param Player $player
     */
    public function removePlayer(Player $player)
    {
        $this->players->removeElement($player);
    }

    /**
     * Get players
     *
     * @return Collection
     */
    public function getPlayers()
    {
        return $this->players;
    }
}

