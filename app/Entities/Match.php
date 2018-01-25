<?php

namespace Tournament\Entities;;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Mapping as ORM;
use Tournament\Entities\Statics\MatchStatus;
use Tournament\Helpers\HelperTraits\InstanceMaker;

/**
 * Match
 *
 * @ORM\Table(name="matches", indexes={
 *      @ORM\Index(name="match_stadium_id_foreign", columns={"stadium_id"}),
 *      @ORM\Index(name="match_referre_id_foreign", columns={"referre_id"}),
 *      @ORM\Index(name="match_home_team_id_foreign", columns={"home_team_id"}),
 *      @ORM\Index(name="match_away_team_id_foreign", columns={"away_team_id"}),
 *      @ORM\Index(name="match_group_id_foreign", columns={"group_id"}),
 *      @ORM\Index(name="match_status", columns={"status"})
 * })
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Match
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
     * @var \DateTime
     *
     * @ORM\Column(name="schedule", type="datetime", precision=0, scale=0, nullable=true, unique=false)
     */
    private $schedule;

    /**
     * @var Team
     *
     * @ORM\ManyToOne(targetEntity="Team")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="away_team_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $awayTeam;

    /**
     * @var Group
     *
     * @ORM\ManyToOne(targetEntity="Group")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="group_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $group;

    /**
     * @var Team
     *
     * @ORM\ManyToOne(targetEntity="Team")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="home_team_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $homeTeam;

    /**
     * @var int MatchStatus
     *
     * @ORM\Column(name="status", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $status;

    /**
     * @var Referre
     *
     * @ORM\ManyToOne(targetEntity="Referre")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="referre_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $referre;

    /**
     * @var Stadium
     *
     * @ORM\ManyToOne(targetEntity="Stadium")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="stadium_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $stadium;

    /**
     * @var MatchResult[]|ArrayCollection
     *
     * One Match has Many MatchResult.
     * @ORM\OneToMany(targetEntity="MatchResult", mappedBy="match", cascade={"persist"})
     */
    private $results;

    /**
     * @var MatchFact[]|ArrayCollection
     *
     * One Match has Many MatchFact.
     * @ORM\OneToMany(targetEntity="MatchFact", mappedBy="match", cascade={"persist"})
     * @ORM\OrderBy({"timeOffset" = "ASC"})
     */
    private $facts;

    /**
     * @var MatchPoint[]|ArrayCollection
     *
     * One Match has Many MatchPoint. One record per teams
     * @ORM\OneToMany(targetEntity="MatchPoint", mappedBy="match", cascade={"persist"})
     */
    private $points;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->results = new ArrayCollection();
        $this->points = new ArrayCollection();
        $this->facts = new ArrayCollection();
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
     * Set schedule
     *
     * @param \DateTime $schedule
     *
     * @return Match
     */
    public function setSchedule($schedule)
    {
        $this->schedule = $schedule;

        return $this;
    }

    /**
     * Get schedule
     *
     * @return \DateTime
     */
    public function getSchedule()
    {
        return $this->schedule;
    }

    /**
     * Set awayTeam
     *
     * @param Team $awayTeam
     *
     * @return Match
     */
    public function setAwayTeam(Team $awayTeam = null)
    {
        $this->awayTeam = $awayTeam;

        return $this;
    }

    /**
     * Get awayTeam
     *
     * @return Team
     */
    public function getAwayTeam()
    {
        return $this->awayTeam;
    }

    /**
     * Set group
     *
     * @param Group $group
     *
     * @return Match
     */
    public function setGroup(Group $group = null)
    {
        $this->group = $group;

        return $this;
    }

    /**
     * Get group
     *
     * @return Group
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * Set homeTeam
     *
     * @param Team $homeTeam
     *
     * @return Match
     */
    public function setHomeTeam(Team $homeTeam = null)
    {
        $this->homeTeam = $homeTeam;

        return $this;
    }

    /**
     * Get homeTeam
     *
     * @return Team
     */
    public function getHomeTeam()
    {
        return $this->homeTeam;
    }

    /**
     * Set status
     *
     * @param int $status
     *
     * @return Match
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set referre
     *
     * @param Referre $referre
     *
     * @return Match
     */
    public function setReferre(Referre $referre = null)
    {
        $this->referre = $referre;

        return $this;
    }

    /**
     * Get referre
     *
     * @return Referre
     */
    public function getReferre()
    {
        return $this->referre;
    }

    /**
     * Set stadium
     *
     * @param Stadium $stadium
     *
     * @return Match
     */
    public function setStadium(Stadium $stadium = null)
    {
        $this->stadium = $stadium;

        return $this;
    }

    /**
     * Get stadium
     *
     * @return Stadium
     */
    public function getStadium()
    {
        return $this->stadium;
    }

    /**
     *
     * @return MatchResult[]|ArrayCollection
     */
    function getResults()
    {
        return $this->results;
    }

    /**
     *
     * @param MatchResult $result
     * @return $this
     */
    public function addResult(MatchResult $result)
    {
        $this->results->add($result);

        return $this;
    }

    /**
     *
     * @param MatchResult $result
     * @return $this
     */
    public function removeResult(MatchResult $result)
    {
        $this->results->removeElement($result);

        return $this;
    }

    /**
     *
     * @return MatchPoint[]|ArrayCollection
     */
    function getPoints()
    {
        return $this->points;
    }

    /**
     *
     * @param MatchPoint $point
     * @return $this
     */
    public function addPoint(MatchPoint $point)
    {
        $this->points->add($point);

        return $this;
    }

    /**
     *
     * @param MatchPoint $point
     * @return $this
     */
    public function removePoint(MatchPoint $point)
    {
        $this->points->removeElement($point);

        return $this;
    }

    /**
     *
     * @param int $setNumber
     * @return MatchResult
     */
    public function getResult($setNumber, Team $team)
    {
        foreach ($this->getResults() as $result) {
            if ($result->getSetNumber() == $setNumber && $result->getTeam()->getId() == $team->getId()) {
                return $result;
            }
        }

        return null;
    }

    /**
     *
     * @param int $setNumber
     * @return MatchResult
     */
    public function getOveralResult()
    {
        return $this->getResults()->first();
    }

    /**
     *
     * @return MatchFact[]|ArrayCollection
     */
    function getFacts()
    {
        return $this->facts;
    }

    /**
     *
     * @param MatchFact $fact
     * @return $this
     */
    public function addFact(MatchFact $fact)
    {
        $this->facts->add($fact);
        $fact->setMatch($this);

        return $this;
    }

    /**
     *
     * @param MatchFact $fact
     * @return $this
     */
    public function removeFact(MatchFact $fact)
    {
        $this->facts->removeElement($fact);

        return $this;
    }

    /**
     * @ORM\PrePersist
     */
    public function prePersist(LifecycleEventArgs $event)
    {
//        if (!$this->getStatus()) {
//            /**
//             * @todo Think about next line
//             */
//            $this->setMatchStatus($event->getEntityManager()->find(MatchStatus::class, 1));
//        }
    }
}
