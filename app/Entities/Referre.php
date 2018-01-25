<?php
namespace Tournament\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Referre
 *
 * @ORM\Table(name="referre", indexes={@ORM\Index(name="referre_tournament_id_foreign", columns={"tournament_id"}), @ORM\Index(name="referre_user_id_foreign", columns={"user_id"})})
 * @ORM\Entity
 */
class Referre
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
     * @ORM\Column(name="fname", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $fname;

    /**
     * @var string
     *
     * @ORM\Column(name="lname", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $lname;

    /**
     * @var string
     *
     * @ORM\Column(name="nname", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $nname;

    /**
     * @var string
     *
     * @ORM\Column(name="abrv", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $abrv;

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
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $user;


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
     * Set fname
     *
     * @param string $fname
     *
     * @return Referre
     */
    public function setFname($fname)
    {
        $this->fname = $fname;

        return $this;
    }

    /**
     * Get fname
     *
     * @return string
     */
    public function getFname()
    {
        return $this->fname;
    }

    /**
     * Set lname
     *
     * @param string $lname
     *
     * @return Referre
     */
    public function setLname($lname)
    {
        $this->lname = $lname;

        return $this;
    }

    /**
     * Get lname
     *
     * @return string
     */
    public function getLname()
    {
        return $this->lname;
    }

    /**
     * Set nname
     *
     * @param string $nname
     *
     * @return Referre
     */
    public function setNname($nname)
    {
        $this->nname = $nname;

        return $this;
    }

    /**
     * Get nname
     *
     * @return string
     */
    public function getNname()
    {
        return $this->nname;
    }

    /**
     * Set abrv
     *
     * @param string $abrv
     *
     * @return Referre
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
     * Set tournament
     *
     * @param Tournament $tournament
     *
     * @return Referre
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
     * Set user
     *
     * @param User $user
     *
     * @return Referre
     */
    public function setUser(User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }
}

