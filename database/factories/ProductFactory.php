<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // generate a few words for product name, capitalizing first letter of each
        $name = collect($this->faker->words)->map(function($word) {
            return ucfirst($word);
        })->implode(' ');

        return [
            'name' => $name,
            'short_description' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'price' => $this->faker->numberBetween($min = 1000, $max = 90000),
            'on_layaway' => $this->faker->boolean($chanceOfGettingTrue = 10),
        ];
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterMaking(function (Product $product) {
            $store = Store::first();

            // fetch the pre-seeded category ids and pick a random id
            $categories = Category::all();
            $randomCategory = $categories->pluck('id')->random();

            // add the relationships
            $product->store()->associate($store);
            $product->category()->associate($randomCategory);
        });
    }

}
