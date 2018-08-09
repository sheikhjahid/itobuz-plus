<?php

use Illuminate\Database\Seeder;
use App\Policy;
class CreateLeaveTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Policy::create([
        	'name' => 'sick-leave full-day'        	
        ]);
        Policy::create([
        	'name' => 'casual-leave full-day'        	
        ]);
        Policy::create([
        	'name' => 'earned-leave full-day'        	
        ]);
        Policy::create([
        	'name' => 'compensatory-leave full-day'        	
        ]);
        Policy::create([
        	'name' => 'sick-leave half-day'        	
        ]);
        Policy::create([
        	'name' => 'casual-leave half-day'        	
        ]);
        Policy::create([
        	'name' => 'earned-leave half-day'        	
        ]);
        Policy::create([
        	'name' => 'compensatory-leave half-day'        	
        ]);
    }
}
