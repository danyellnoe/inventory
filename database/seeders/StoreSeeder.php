<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create a stores
        DB::table('stores')->insert([
            'name' => "DNoe's Antique Shoppe",
            'description' => 'A great place to buy unique collectables!',
            'location' => 'Monument, CO',
        ]);
    }
}
