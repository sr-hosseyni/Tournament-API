<?php
namespace Tournament\Entities\MatchFacts;

use Doctrine\ORM\Mapping as ORM;
use Tournament\Entities\MatchFact;
use Tournament\Entities\Player;
use Tournament\Entities\Team;


/**
 * Substitution
 *
 * @ORM\Table(name="me_substitution")
 * @ORM\Entity
 */
class Substitution extends MatchFact
{

}

