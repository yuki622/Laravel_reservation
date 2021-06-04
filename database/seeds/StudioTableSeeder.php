<?php

use Illuminate\Database\Seeder;
use App\Models\Studio;

class StudioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        factory(\App\Models\Studio::class, 10)
            ->create();
        
        
       
    }
}
