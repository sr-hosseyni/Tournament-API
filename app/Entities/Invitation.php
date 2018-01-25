<?php
namespace Tournament\Entities;



use Doctrine\ORM\Mapping as ORM;

/**
 * Invitation
 *
 * @ORM\Table(name="invitation", indexes={@ORM\Index(name="invitation_tournament_id_foreign", columns={"tournament_id"}), @ORM\Index(name="invitation_applier_user_id_foreign", columns={"applier_user_id"}), @ORM\Index(name="invitation_referred_user_id_foreign", columns={"referred_user_id"})})
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Invitation
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
     * @ORM\Column(name="referred_mail", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $referredMail;

    /**
     * @var boolean
     *
     * @ORM\Column(name="register_token", type="boolean", precision=0, scale=0, nullable=true, unique=false)
     */
    private $registerToken;

    /**
     * @var boolean
     *
     * @ORM\Column(name="reply", type="boolean", precision=0, scale=0, nullable=true, unique=false)
     */
    private $reply;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", precision=0, scale=0, nullable=false, unique=false)
     */
    private $createdAt;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="applier_user_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $applierUser;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="referred_user_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $referredUser;

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
     * Set referredMail
     *
     * @param string $referredMail
     *
     * @return Invitation
     */
    public function setReferredMail($referredMail)
    {
        $this->referredMail = $referredMail;

        return $this;
    }

    /**
     * Get referredMail
     *
     * @return string
     */
    public function getReferredMail()
    {
        return $this->referredMail;
    }

    /**
     * Set registerToken
     *
     * @param boolean $registerToken
     *
     * @return Invitation
     */
    public function setRegisterToken($registerToken)
    {
        $this->registerToken = $registerToken;

        return $this;
    }

    /**
     * Get registerToken
     *
     * @return boolean
     */
    public function getRegisterToken()
    {
        return $this->registerToken;
    }

    /**
     * Set reply
     *
     * @param boolean $reply
     *
     * @return Invitation
     */
    public function setReply($reply)
    {
        $this->reply = $reply;

        return $this;
    }

    /**
     * Get reply
     *
     * @return boolean
     */
    public function getReply()
    {
        return $this->reply;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Invitation
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set applierUser
     *
     * @param User $applierUser
     *
     * @return Invitation
     */
    public function setApplierUser(User $applierUser = null)
    {
        $this->applierUser = $applierUser;

        return $this;
    }

    /**
     * Get applierUser
     *
     * @return User
     */
    public function getApplierUser()
    {
        return $this->applierUser;
    }

    /**
     * Set referredUser
     *
     * @param User $referredUser
     *
     * @return Invitation
     */
    public function setReferredUser(User $referredUser = null)
    {
        $this->referredUser = $referredUser;

        return $this;
    }

    /**
     * Get referredUser
     *
     * @return User
     */
    public function getReferredUser()
    {
        return $this->referredUser;
    }

    /**
     * Set tournament
     *
     * @param Tournament $tournament
     *
     * @return Invitation
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
     * @ORM\PrePersist
     */
    public function prePersist()
    {
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
    }

    /**
     * @ORM\PreUpdate
     */
    public function preUpdate()
    {
        $this->updatedAt = new \DateTime();
    }
}

