<?php

use Illuminate\Database\Seeder;
use App\User;
class CreateUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'name' => 'jahid+admin',
        	'email' => 'jahid+admin@itobuz.com',
        	'password' => Hash::make('jahid@123'),
        	'address' => 'kolkata',
            'phone' => 9877382131,
        	'status' => 1,
        	'team_id' => 1,
            'role_id' => 1
        ]);

        $user = User::create([
            'name' => 'jahid+user',
            'email' => 'jahid+user@itobuz.com',
            'password' => Hash::make('jahid@1234'),
            'address' => 'kolkata',
            'phone' => 9876738921,
            'status' => 1,
            'team_id' => 3,
            'role_id' => 1
        ]);
    }
}
