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
            'status' => 1
        ]);
        Team::create([
        	'name' => 'front-end',
            'status' => 1
        ]);
        Team::create([
        	'name' => 'back-end',
            'status' => 1
        ]);
        Team::create([
        	'name' => 'wordpress',
            'status' => 1
        ]);
        Team::create([
        	'name' => 'elegant-themes',
            'status' => 1
        ]);
        Team::create([
        	'name' => 'quality assurance',
            'status' => 1
        ]);
        Team::create([
        	'name' => 'marketing',
            'status' => 1
        ]);
        Team::create([
        	'name' => 'design',
            'status' => 1
        ]);
        Team::create([
        	'name' => 'human resource',
            'status' => 1
        ]);
    }
}
