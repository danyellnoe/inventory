<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create some categories
        $categories = collect([
            [
                'name' => 'Automotive',
                'description' => 'All your auto needs',
            ],
            [
                'name' => 'Baby',
                'description' => 'Taking care of your little one',
            ],
            [
                'name' => 'Clothing',
                'description' => 'Wear something cool',
            ],
            [
                'name' => 'Electronics',
                'description' => 'Nothing beats a good gadget'
            ],
            [
                'name' => 'Housewares',
                'description' => 'Your home, your style'
            ],
            [
                'name' => 'Toys',
                'description' => 'Fun for the whole family'
            ],
        ]);

        $categories->each(function ($cat) {
            DB::table('categories')->insert([
                'name' => $cat['name'],
                'description' => $cat['description'],
        ]);
    });

    }
}
