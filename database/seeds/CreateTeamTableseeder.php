<?php

use Illuminate\Database\Seeder;
use App\Team;

class CreateTeamTableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Team::create([
        	'name' => 'admin',
        ]);
        Team::create([
        	'name' => 'front-end',
        ]);
        Team::create([
        	'name' => 'back-end',
        ]);
        Team::create([
        	'name' => 'wordpress',
        ]);
        Team::create([
        	'name' => 'elegant-themes',
        ]);
        Team::create([
        	'name' => 'quality assurance',
        ]);
        Team::create([
        	'name' => 'marketing',
        ]);
        Team::create([
        	'name' => 'design',
        ]);
        Team::create([
        	'name' => 'human resource',
        ]);
    }
}
