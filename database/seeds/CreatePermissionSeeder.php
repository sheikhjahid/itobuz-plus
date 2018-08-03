<?php

use Illuminate\Database\Seeder;
use App\Permission;
class CreatePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
        	'description' => 'creates,updates and deletes users'
        ])->role()->attach(['role_id'=>1]);

	    Permission::create([
        	'description' => 'creates,updates and deletes users'
        ])->role()->attach(['role_id'=>4]);
		
	    Permission::create([
        	'description' => 'creates,updates and deletes users'
        ])->role()->attach(['role_id'=>5]);

         Permission::create([
        	'description' => 'approves and rejects leave for team-leader and team-member'
        ])->role()->attach(['role_id'=>1]);

         Permission::create([
        	'description' => 'approves and rejects leave for team-leader and team-member'
        ])->role()->attach(['role_id'=>4]);
         Permission::create([
        	'description' => 'approves and rejects leave for team-leader and team-member'
        ])->role()->attach(['role_id'=>5]);

		 Permission::create([
        	'description' => 'applies leave, approve and rejects leave for team-member '
        ])->role()->attach(['role_id'=>2]);

		 Permission::create([
        	'description' => 'applies leave and updates work with team-leader'
        ])->role()->attach(['role_id'=>3]);

		 Permission::create([
		 	'description' => 'views total users,caculates total leave-taken and maintains a sheet'])->role()->attach(['role_id'=>6]);
    }
}
