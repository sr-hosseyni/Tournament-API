<?php

use Illuminate\Hashing\BcryptHasher;
use Tournament\Entities\Invitation;
use Tournament\Entities\Tournament;
use Tournament\Entities\User;

class InvitationSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tournament = $this->em->getRepository(Tournament::class)->findOneBy([]);

        $fnames = ['Daniel', 'Teddy', 'Leonard', 'Jose Antonio', 'Steve', 'Richard', 'Rose'];
        $lnames = ['More', 'Gerard', 'Terry', 'Gambel', 'Ricardo', 'Stein Bek', 'Dawkinse'];

        $fname = $fnames[rand(0, 6)];
        $lname = $lnames[rand(0, 6)];

        $user = new User();
        $user
            ->setFname($fname)
            ->setLname($lname)
            ->setEmail(sprintf('%s.%s.%d@gmail.com', $fname, $lname, (time() % 1000)))
            ->setPassword((new BcryptHasher)->make('1234'));

        $this->em->persist($user);
        $this->em->flush();

        $refferedUser = $this->em->createQueryBuilder()
            ->select('u')
            ->from(User::class, 'u')
            ->where('u.id != :applierUserId')
            ->getQuery()
            ->execute(['applierUserId' => $user->getId()]);

        $invitation = new Invitation();
        $invitation
            ->setTournament($tournament)
            ->setApplierUser($user)
            ->setReferredUser($refferedUser[0]);

        $this->em->persist($invitation);
        $this->em->flush();
    }
}
