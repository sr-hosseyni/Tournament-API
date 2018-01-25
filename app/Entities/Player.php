<?php
namespace Tournament\Entities;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Player
 *
 * @ORM\Table(name="player", indexes={@ORM\Index(name="player_user_id_foreign", columns={"user_id"})})
 * @ORM\Entity
 */
class Player
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
     * @ORM\Column(name="abrv", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $abrv;

    /**
     * @var string
     *
     * @ORM\Column(name="img", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $img;

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
     * @var Collection|Team[]
     *
     * Inverse Side
     *
     * @ORM\ManyToMany(targetEntity="Team", mappedBy="players")
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
     * Set abrv
     *
     * @param string $abrv
     *
     * @return Player
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
     * Set img
     *
     * @param string $img
     *
     * @return Player
     */
    public function setImg($img)
    {
        $this->img = $img;

        return $this;
    }

    /**
     * Get img
     *
     * @return string
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * Set user
     *
     * @param User $user
     *
     * @return Player
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

    /**
     * Add team
     *
     * @param Team $team
     *
     * @return Player
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

