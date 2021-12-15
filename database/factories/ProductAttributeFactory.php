<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductAttribute;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductAttributeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductAttribute::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type'             => $type = $this->faker->randomElement(array('number', 'text', 'textarea')),
            'title'            => $type === 'number' ? $this->faker->randomElement(array('width', 'height', 'depth')) : $this->faker->randomElement(array('further details', 'colour')),
            'measurement'      => $type === 'number' ? true : false,
        ];
    }

    public function withProduct()
    {
        return $this->state(function ($attributes) {
            return [
                'product_id' => Product::inRandomOrder()->first()->id
            ];
        });
    }
}
