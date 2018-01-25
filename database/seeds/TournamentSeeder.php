<?php
use Tournament\Entities\Tournament;

class TournamentSeeder extends BaseSeeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tournament = Tournament::getInstance()
            ->setName('CHAMPIONS LEAGUE 2016')
            ->setSequenceNo(1)
            ->setPlatform('Foosball')
            ->setLogo('images/EQWHJKQWPRV342VU3RVFWL.jpg')
            ->setRegisterStart(new \DateTime('2017-01-29 00:00:00'))
            ->setRegisterFinish(new \DateTime('2017-02-20 23:59:59'))
            ->setCompetitionStart(new \DateTime('2017-02-29 00:00:00'))
            ->setCompetitionFinish(new \DateTime('2017-03-29 23:59:59'))
            ->setIsSingleStage(false);

        $this->em->persist($tournament);
        $this->em->flush();
    }
}
