<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Shipping;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        return [
            'title'            => $this->faker->randomElement( array('Alcove storage unit', 'Wardrobe storage', 'Drawer storage', 'Misc Storage') ),
            'slug'             => Str::slug($this->faker->sentence(3)),
            'meta_description' => $this->faker->sentence,
            'description'      => $this->faker->sentence,
            'short_description'=> $this->faker->sentence(5),
            'price'            => $price = $this->faker->numberBetween(120000,250000),
            'sale_price'       => null,
            'active'           => $this->faker->boolean(50),
            'featured'         => $this->faker->boolean(50),
        ];
    }

    public function withCategory()
    {
        return $this->state(function ($attributes) {
            return [
                'product_category_id' => ProductCategory::inRandomOrder()->first()->id
            ];
        });
    }

    public function withShipping()
    {
        return $this->state(function ($attributes) {
            return [
                'shipping_id' => Shipping::inRandomOrder()->first()->id
            ];
        });
    }
}
