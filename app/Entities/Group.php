<?php
namespace Tournament\Entities;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Tournament\Helpers\HelperTraits\InstanceMaker;

/**
 * Group
 *
 * @ORM\Table(name="groups", indexes={@ORM\Index(name="groups_stage_id_foreign", columns={"stage_id"})})
 * @ORM\Entity
 */
class Group
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
     * @var integer
     *
     * @ORM\Column(name="sequence_no", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $sequenceNo;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $name;

    /**
     * @var Stage
     *
     * @ORM\ManyToOne(targetEntity="Stage")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="stage_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $stage;

    /**
     * @var Collection|Team[]
     *
     * Owning Side
     *
     * @ORM\ManyToMany(targetEntity="Team", inversedBy="groups")
     * @ORM\JoinTable(name="group_team",
     *   joinColumns={
     *     @ORM\JoinColumn(name="group_id", referencedColumnName="id", nullable=true)
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="team_id", referencedColumnName="id", nullable=true)
     *   }
     * )
     */
    private $teams;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->teams = new ArrayCollection();
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
     * @return Group
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
     * @return Group
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
     * Set stage
     *
     * @param Stage $stage
     *
     * @return Group
     */
    public function setStage(Stage $stage = null)
    {
        $this->stage = $stage;

        return $this;
    }

    /**
     * Get stage
     *
     * @return Stage
     */
    public function getStage()
    {
        return $this->stage;
    }

    /**
     * Add team
     *
     * @param Team $team
     *
     * @return Group
     */
    public function addTeam(Team $team)
    {
        $this->teams[] = $team;

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
     * @return Collection
     */
    public function getTeams()
    {
        return $this->teams;
    }
}

