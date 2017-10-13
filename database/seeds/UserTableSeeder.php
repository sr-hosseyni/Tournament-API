<?php

use BMS\Entities\User;

class UserTableSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = BMS\API\V1\Entities\User::getInstance()
            ->setEmail('foo.bar@gmail.com')
            ->setFirstName('fname')
            ->setUsername('foo_bar')
            ->setPassword(bcrypt('secret'));

        $this->em->persist($user);
        $this->em->flush();
    }
}
