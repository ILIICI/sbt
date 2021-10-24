<?php

namespace Database\Factories;

use App\Models\Product;
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
        $faker = \Faker\Factory::create();
        $faker->addProvider(new \Bezhanov\Faker\Provider\Commerce($faker));
        
        return [
            'product_title' => $faker->productName,
            'product_description' => $faker->text(250),
            'product_imgURL' => $faker->imageUrl(250, 250, 'BLUE TEAM'),
            'product_price' => rand(1000,10000)
        ];
    }
}
