<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\User;
use App\Models\Product;
use App\Models\ProductTag;
use App\Models\Attribute;
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
        User::factory(1)->create();
        Tag::factory(9)->create();
        Product::factory(48)->create()->each(function($product) {
            ProductTag::factory(rand(1,2))->create([
                'product_id' => $product->id
            ]);
            if(rand(0,1) == 1){
                Attribute::factory()->create([
                    'product_id' => $product->id
                ]);
            }
        });
    }
}
