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
        	'name' => 'admin'
        ]);
        Role::create([
        	'name' => 'team-leader'
        ]);
        Role::create([
        	'name' => 'team-member'
        ]);
        Role::create([
        	'name' => 'ceo'
        ]);
        Role::create([
        	'name' => 'cto'
        ]);
        Role::create([
        	'name' => 'human resource'
        ]);
    }
}
