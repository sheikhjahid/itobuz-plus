<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(CreateTeamTableseeder::class);
         $this->call(CreateRoleTableSeeder::class);
         $this->call(CreateLeaveTypesSeeder::class);
         $this->call(CreateUsersTableSeeder::class);
    }
}
