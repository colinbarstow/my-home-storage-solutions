<?php

namespace Database\Factories;

use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'title'            => $this->faker->unique()->randomElement(array('Wardrobes', 'Alcoves', 'Drawers', 'Modern', 'Chic', 'Classic')),
            'slug'             => Str::slug($this->faker->sentence(3)),
            'meta_description' => $this->faker->sentence,
            'description'      => $this->faker->sentence,
            'image'            => 'public/product-categories/original/test.jpg',
            'thumbnail'        => 'public/product-categories/thumbnail/test.jpg',
            'active'           => $this->faker->boolean(50),
            'featured'         => $this->faker->boolean(50),
        ];

    }
}
