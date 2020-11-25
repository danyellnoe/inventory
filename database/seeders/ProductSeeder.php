<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create some products and add a comment to each
        Product::factory()
            ->times(50)
            ->has(Comment::factory()->times(1))
            ->create([
                'store_id' => 0,
                'category_id' => 0,
            ]);
    }
}
