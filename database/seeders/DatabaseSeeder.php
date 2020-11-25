<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            StoreSeeder::class,     // create the store
            CategorySeeder::class,  // create categories
            ProductSeeder::class,   // create products (will also generate comments)
        ]);

    }
}
