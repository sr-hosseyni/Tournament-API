<?php
namespace Tournament\Entities;;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Tournament\Helpers\HelperTraits\InstanceMaker;

/**
 * Tournament
 *
 * @ORM\Table(name="tournament")
 * @ORM\Entity(repositoryClass="\Tournament\Entities\Repositories\Tournament\TournamentRepository")
 */
class Tournament
{
    use InstanceMaker;

    const TYPE_SINGLE_STAGE = 1;
    const TYPE_MULTI_STAGE = 2;


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
     * @var string
     *
     * @ORM\Column(name="platform", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $platform;

    /**
     * @var string
     *
     * @ORM\Column(name="logo", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $logo;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_sigle_stage", type="boolean", precision=0, scale=0, nullable=false, unique=false)
     */
    private $isSingleStage = true;

    /**
     * @var boolean
     *
     * @ORM\Column(name="has_matchs_referre", type="boolean", precision=0, scale=0, nullable=false, unique=false)
     */
    private $hasMatchsReferre = false;

    /**
     * @var boolean
     *
     * @ORM\Column(name="team_members_count", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $teamMembersCount = 1;

    /**
     * @var boolean
     *
     * @ORM\Column(name="has_invitation", type="boolean", precision=0, scale=0, nullable=false, unique=false)
     */
    private $hasInvitation = false;

    /**
     * @var boolean
     *
     * @ORM\Column(name="has_registration", type="boolean", precision=0, scale=0, nullable=false, unique=false)
     */
    private $hasRegistration = true;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="register_start", type="datetime", precision=0, scale=0, nullable=true, unique=false)
     */
    private $registerStart;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="register_finish", type="datetime", precision=0, scale=0, nullable=true, unique=false)
     */
    private $registerFinish;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="competition_start", type="datetime", precision=0, scale=0, nullable=true, unique=false)
     */
    private $competitionStart;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="competition_finish", type="datetime", precision=0, scale=0, nullable=true, unique=false)
     */
    private $competitionFinish;

    /**
     * @var Stage[]
     *
     * @ORM\OneToMany(targetEntity="Stage", mappedBy="tournament")
     */
    private $stages;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->stages = new ArrayCollection();
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
     * @return Tournament
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
     * @return Tournament
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
     * Set platform
     *
     * @param string $platform
     *
     * @return Tournament
     */
    public function setPlatform($platform)
    {
        $this->platform = $platform;

        return $this;
    }

    /**
     * Get platform
     *
     * @return string
     */
    public function getPlatform()
    {
        return $this->platform;
    }

    /**
     * Set logo
     *
     * @param string $logo
     *
     * @return Tournament
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
     * Set isSingleStage
     *
     * @param boolean $isSingleStage
     *
     * @return Tournament
     */
    public function setIsSingleStage($isSingleStage)
    {
        $this->isSingleStage = $isSingleStage;

        return $this;
    }

    /**
     * Get isSingleStage
     *
     * @return boolean
     */
    public function getIsSingleStage()
    {
        return $this->isSingleStage;
    }

    /**
     * Set hasMatchsReferre
     *
     * @param boolean $hasMatchsReferre
     *
     * @return Tournament
     */
    public function setHasMatchsReferre($hasMatchsReferre)
    {
        $this->hasMatchsReferre = $hasMatchsReferre;

        return $this;
    }

    /**
     * Get hasMatchsReferre
     *
     * @return boolean
     */
    public function getHasMatchsReferre()
    {
        return $this->hasMatchsReferre;
    }

    /**
     * Set teamMembersCount
     *
     * @param integer $teamMembersCount
     *
     * @return Tournament
     */
    public function setTeamMembersCount($teamMembersCount)
    {
        $this->teamMembersCount = $teamMembersCount;

        return $this;
    }

    /**
     * Get teamMembersCount
     *
     * @return integer
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
     * @return Tournament
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
     * @return Tournament
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
     * Set registerStart
     *
     * @param \DateTime $registerStart
     *
     * @return Tournament
     */
    public function setRegisterStart($registerStart)
    {
        $this->registerStart = $registerStart;

        return $this;
    }

    /**
     * Get registerStart
     *
     * @return \DateTime
     */
    public function getRegisterStart()
    {
        return $this->registerStart;
    }

    /**
     * Set registerFinish
     *
     * @param \DateTime $registerFinish
     *
     * @return Tournament
     */
    public function setRegisterFinish($registerFinish)
    {
        $this->registerFinish = $registerFinish;

        return $this;
    }

    /**
     * Get registerFinish
     *
     * @return \DateTime
     */
    public function getRegisterFinish()
    {
        return $this->registerFinish;
    }

    /**
     * Set competitionStart
     *
     * @param \DateTime $competitionStart
     *
     * @return Tournament
     */
    public function setCompetitionStart($competitionStart)
    {
        $this->competitionStart = $competitionStart;

        return $this;
    }

    /**
     * Get competitionStart
     *
     * @return \DateTime
     */
    public function getCompetitionStart()
    {
        return $this->competitionStart;
    }

    /**
     * Set competitionFinish
     *
     * @param \DateTime $competitionFinish
     *
     * @return Tournament
     */
    public function setCompetitionFinish($competitionFinish)
    {
        $this->competitionFinish = $competitionFinish;

        return $this;
    }

    /**
     * Get competitionFinish
     *
     * @return \DateTime
     */
    public function getCompetitionFinish()
    {
        return $this->competitionFinish;
    }

    /**
     * Add stage
     *
     * @param Stage $stage
     *
     * @return Tournament
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
}

