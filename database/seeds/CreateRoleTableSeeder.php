<?php

use Illuminate\Database\Seeder;
use App\Role;
class CreateRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
        	'name' => 'admin',
            'status' => 1
        ]);
        Role::create([
        	'name' => 'team-leader',
            'status' => 1
        ]);
        Role::create([
        	'name' => 'team-member',
            'status' => 1
        ]);
        Role::create([
        	'name' => 'ceo',
            'status' => 1
        ]);
        Role::create([
        	'name' => 'cto',
            'status' => 1
        ]);
        Role::create([
        	'name' => 'human resource',
            'status' => 1
        ]);
    }
}
