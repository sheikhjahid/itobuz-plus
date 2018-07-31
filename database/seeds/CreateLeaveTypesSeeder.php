<?php

use Illuminate\Database\Seeder;
use App\Leave_Type;
class CreateLeaveTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Leave_Type::create([
        	'name' => 'sick-leave full-day'        	
        ]);
        Leave_Type::create([
        	'name' => 'casual-leave full-day'        	
        ]);
        Leave_Type::create([
        	'name' => 'earned-leave full-day'        	
        ]);
        Leave_Type::create([
        	'name' => 'compensatory-leave full-day'        	
        ]);
        Leave_Type::create([
        	'name' => 'sick-leave half-day'        	
        ]);
        Leave_Type::create([
        	'name' => 'casual-leave half-day'        	
        ]);
        Leave_Type::create([
        	'name' => 'earned-leave half-day'        	
        ]);
        Leave_Type::create([
        	'name' => 'compensatory-leave half-day'        	
        ]);
    }
}
