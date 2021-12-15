<?php

namespace Database\Factories;

use App\Models\SiteConfiguration;
use Illuminate\Database\Eloquent\Factories\Factory;

class SiteConfigurationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SiteConfiguration::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'logo' => $this->faker->imageUrl(150,50),
            'website_name' => 'My Home Storage Solutions',
            'contact_email' => $this->faker->email,
            'contact_number' => $this->faker->phoneNumber,
            'contact_form_email' => $this->faker->email,
            'address' => $this->faker->address,
        ];
    }
}
