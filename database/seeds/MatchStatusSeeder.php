<?php

use Tournament\Entities\Statics\MatchStatus;

class MatchStatusSeeder extends BaseSeeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            0 => 'unstarted',
            1 => 'started',
//            2 => '1st-half',
//            3 => 'half-time',
//            4 => '2nd-half',
//            5 => '1st-third',
//            6 => '1st-third-time',
//            7 => '2nd-third',
//            8 => '2nd-third-time',
//            9 => '3rd-third',
//            10 => '1st-quarter',
//            11 => '1st-quarter-time',
//            12 => '2nd-quarter',
//            13 => '2nd-quarter-time',
//            14 => '3rd-quarter',
//            15 => '3rd-quarter-time',
//            16 => '4th-quarter',
//            17 => '1st-fifth',
//            18 => '1st-fifth-time',
//            19 => '2nd-fifth',
//            20 => '2nd-fifth-time',
//            21 => '3rd-fifth',
//            22 => '3rd-fifth-time',
//            23 => '4th-fifth',
//            24 => '4th-fifth-time',
//            25 => '5th-fifth',
//            26 => 'extra-time',
//            27 => 'penalty-shots',
//            28 => '1st-extra-half',
//            29 => 'extra-half-time',
//            30 => '2nd-extra-half',
            31 => 'finished',
            32 => 'canseled',
            33 => 'abnormal',
            34 => 'timeout'
        ];

        foreach ($statuses as $index => $status) {
            $status = MatchStatus::getInstance()->setTitle($status);
            if ($index === 0) {
                $status->setType(MatchStatus::TYPE_UNSTARTED);
            }
            $this->em->persist($status);
        }

        $this->em->flush();
    }
}
