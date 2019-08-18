<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TournamentSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(TeamSeeder::class);
        $this->call(StageSeeder::class);
        $this->call(GroupSeeder::class);
        $this->call(MatchSeeder::class);
        
        $this->call(InvitationSeeder::class);
    }
}
