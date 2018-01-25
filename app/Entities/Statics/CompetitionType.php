<?php
namespace Tournament\Entities\Statics;

use Doctrine\ORM\Mapping as ORM;
use Tournament\Helpers\HelperTraits\InstanceMaker;

/**
 * CompetitionType for example Football, Footsal, Foosball or Football-Video-Game(PES, FIFA)
 *
 * @ORM\Table(name="competition_type", indexes={@ORM\Index(name="idx_competition_type_title", columns={"title"})})
 * @ORM\Entity
 */
class CompetitionType
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
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $title;

    /**
     * @var CompetitionType
     *
     * @ORM\ManyToOne(targetEntity="CompetitionType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     * })
     */
    private $parent;


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
     * Set title
     *
     * @param string $title
     *
     * @return string
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }
}

