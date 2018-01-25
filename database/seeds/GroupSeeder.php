<?php

use Tournament\Entities\Group;
use Tournament\Entities\Stage;
use Tournament\Entities\Team;

class GroupSeeder extends BaseSeeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stage = $this->em->getRepository(Stage::class)
            ->findOneBy(['sequenceNo' => 1]);

        $team = $this->em->getRepository(Team::class)
            ->findOneBy([]);

        $group = Group::getInstance()
            ->setName('Group A')
            ->setSequenceNo(1)
            ->setStage($stage)
            ->addTeam($team);

        $this->em->persist($group);
        $this->em->flush();
    }
}
