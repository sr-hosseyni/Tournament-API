<?php
use Tournament\Entities\Tournament,
    Tournament\Entities\Stage;

use Tournament\Core\TournamentManager;

class TournamentSeeder extends BaseSeeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tm = TournamentManager::make(false);

        $tournament = $tm->getTournament()
            ->setName('CHAMPIONS LEAGUE 2016')
            ->setPlatform('Foosball')
            ->setLogo('images/EQWHJKQWPRV342VU3RVFWL.jpg')
            ->setRegisterStart(new \DateTime('2017-01-29 00:00:00'))
            ->setRegisterFinish(new \DateTime('2017-02-20 23:59:59'))
            ->setCompetitionStart(new \DateTime('2017-02-29 00:00:00'))
            ->setCompetitionFinish(new \DateTime('2017-03-29 23:59:59'));

        $tm->addDefaultStage();

        $this->em->persist($tournament);
        $this->em->flush();
    }
}
