<?php

namespace Database\Factories;

use App\Models\Shipping;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ShippingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Shipping::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'description'   => $this->faker->sentence,
            'carrier'       => $this->faker->unique()->randomElement(array('UPS', 'FedEX', 'Royal Mail', 'ParcelForce')),
            'delivery_time' => $this->faker->randomElement(array('2 days', '3 days', '5 days', '10 days')),
        ];
    }
}
