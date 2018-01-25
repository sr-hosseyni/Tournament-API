<?php

use Tournament\Entities\Team;
use Tournament\Entities\Tournament;
use Tournament\Entities\Player;

class TeamSeeder extends BaseSeeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teams_name = ['United', 'Joker', 'Signature', 'Hogs'];
        $teams_abrv = ['UTD', 'JKR', 'SGNT', 'HOGS'];
        $teams_logo = [
            'storage/images/teams/1.jpg',
            'storage/images/teams/joker.jpg',
            'storage/images/teams/Tibet.png',
            'storage/images/teams/signature.png'
        ];

        $players = $this->em->getRepository(Player::class)->findAll();
        $tournament = $this->em->getRepository(Tournament::class)->findOneBy([]);

        if (count($players) < 8) {
            throw new Exception('Players are too few');
        }

        for ($i = 0; $i < count($teams_name); $i++) {
            $team = new Team();
            $team
                ->setName($teams_name[$i])
                ->setAbrv($teams_abrv[$i])
                ->setTournament($tournament)
                ->setLogo($teams_logo[$i])
                ->addPlayer($players[$i * 2])
                ->addPlayer($players[$i * 2 + 1]);

            $this->em->persist($team);
        }

        $this->em->flush();
    }
}
