<?php

namespace Database\Factories;

use App\Models\Attribute;
use Illuminate\Database\Eloquent\Factories\Factory;

class AttributeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Attribute::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'attribute_weight' =>rand(1,10),
            'attribute_height' =>rand(10,200),
            'attribute_length' =>rand(10,200),
            'attribute_width' =>rand(10,200)
        ];
    }
}
