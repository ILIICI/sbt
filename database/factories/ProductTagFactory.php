<?php

namespace Database\Factories;

use App\Models\ProductTag;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductTagFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductTag::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = \Faker\Factory::create();
        return [
            'tag_id' => $this->number(1,9)
        ];
    }
    public function number($min, $max) {
        $numbers = range($min, $max);
        shuffle($numbers);
        $counter = 1;
        return $numbers[$counter++];
    }
}
