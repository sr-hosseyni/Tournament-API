<?php

use Tournament\Core\MatchManager;
use Tournament\Entities\Group;
use Tournament\Entities\Match;
use Tournament\Entities\MatchFacts\PlayerScore;
use Tournament\Entities\MatchFacts\TimeBoundary;
use Tournament\Entities\Team;

class MatchSeeder extends BaseSeeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $groups = $this->em->getRepository(Group::class)->findAll();
        $teams = $this->em->getRepository(Team::class)->findAll();

        /* @var $time DateTime */
        $time = date_create('next week');
        for ($i = 0; $i < count($teams); $i += 2) {
            if (!isset($teams[$i + 1])) {
                break;
            }

            $time->add(new DateInterval('PT30M'));

            $manager = MatchManager::make($groups[0], $teams[$i], $teams[$i + 1], $time);

            if ($i == 0) {
                $manager
                    ->addFact(TimeBoundary::getInstance()->setType(TimeBoundary::TYPE_START))
                    ->addFact(PlayerScore::getInstance()
                        ->setTeam($manager->getMatch()->getHomeTeam())
                        ->setTimeOffset(13 * 60)
                        ->setIsHost(true)
                    )
                    ->addFact(TimeBoundary::getInstance()
                        ->setType(TimeBoundary::TYPE_FINISH)
                        ->setTimeOffset(45 * 60)
                    );
            }

            $this->em->persist($manager->getMatch());
        }

        $this->em->flush();
    }
}
