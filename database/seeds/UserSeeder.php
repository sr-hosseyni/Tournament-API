<?php

use Illuminate\Hashing\BcryptHasher;
use Tournament\Entities\Player;
use Tournament\Entities\User;

class UserSeeder extends BaseSeeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::getInstance()
            ->setEmail('foo.bar@gmail.com')
            ->setFname('fname')
            ->setLname('lname')
            ->setUsername('foo_bar')
            ->setPassword(bcrypt('secret'));

        $this->em->persist($user);
        $this->em->flush();

        $user = new User();
        $user
            ->setFname('Russell')
            ->setLname('Hoss')
            ->setNname('Sir')
            ->setEmail('rassoulhosseini@gmail.com')
            ->setPassword((new BcryptHasher)->make('1234'));

        $this->em->persist($user);

        $player = new Player();
        $player
            ->setAbrv('Sir')
            ->setUser($user)
            ->setImg('storage/images/players/1.jpg');

        $this->em->persist($player);

        $fnames = ['Daniel', 'Teddy', 'Leonard', 'Jose Antonio', 'Steve', 'Richard', 'Rose'];
        $lnames = ['More', 'Gerard', 'Terry', 'Gambel', 'Ricardo', 'Stein Bek', 'Dawkinse'];
        $images = [
            'storage/images/players/2.jpg',
            'storage/images/players/3.jpg',
            'storage/images/players/4.jpg',
            'storage/images/players/5.jpg',
            'storage/images/players/6.jpg',
            'storage/images/players/7.jpg',
            'storage/images/players/8.jpg',
            'storage/images/players/9.jpg',
            'storage/images/players/10.jpg',
            'storage/images/players/11.jpg',
        ];


        for ($i = 0; $i < 10; $i++) {
            $fname = $fnames[rand(0, 6)];
            $lname = $lnames[rand(0, 6)];

            $user = new User();
            $user
                ->setFname($fname)
                ->setLname($lname)
                ->setNname('')
                ->setEmail(sprintf(
                    '%s.%s.%d@gmail.com',
                    str_replace(' ', '', $fname), str_replace(' ', '', $lname),
                    $i
                ))
                ->setPassword((new BcryptHasher)->make('1234'));

            $this->em->persist($user);

            $player = new Player();
            $player
                ->setAbrv($fname[0] . $lname[0])
                ->setUser($user)
                ->setImg($images[$i]);

            $this->em->persist($player);
        }

        $this->em->flush();
    }
}
