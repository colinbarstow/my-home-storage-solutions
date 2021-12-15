<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductImage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'image'            => $this->faker->imageUrl(),
            'thumbnail'        => $this->faker->imageUrl(280,280),
        ];
    }

    public function withProduct()
    {
        return $this->state(function ($attributes) {
            return [
                'product_id' => Product::firstOrNew(Product::factory()->withCategory()->withShipping()->create()->toArray())
            ];
        });
    }

    public function withExistingProduct()
    {
        return $this->state(function ($attributes) {
            return [
                'product_id' => Product::inRandomOrder()->first()->id
            ];
        });
    }

    public function withMain()
    {
        return $this->state(function ($attributes) {
            return [
                'main' => true
            ];
        });
    }
}
