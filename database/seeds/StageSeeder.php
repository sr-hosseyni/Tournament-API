<?php

use Tournament\Entities\Stage;
use Tournament\Entities\Team;
use Tournament\Entities\Tournament;


class StageSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tournament = $this->em->getRepository(Tournament::class)->findOneBy([]);
        $teams = $this->em->getRepository(Team::class)->findBy([], null, 4);
        $stage = new Stage();
        $stage->setName('Group Stage')
            ->setSequenceNo(1)
            ->setHomeAndAway(true)
            ->setType(Stage::TYPE_GROUP)
            ->setTournament($tournament)
            ->setTeams($teams);

        $this->em->persist($stage);
        $this->em->flush();
    }
}
