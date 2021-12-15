<?php

namespace Database\Seeders;

use App\Models\SiteConfiguration;
use Illuminate\Database\Seeder;

class SiteConfigurationSeeder extends Seeder
{
    public function run()
    {

        SiteConfiguration::create([
            'logo' => 'Home Page',
            'favicon' => 'Home Page',
            'website_name' => 'My Home Storage Solutions',
            'contact_email' => 'contact@myhomestoragesolutions.com',
            'contact_form_email' => 'contact@myhomestoragesolutions.com',
            'contact_number' => '07896324576',
            'address' => '1 the address, the road, city, county, postcode',
            'measurement' => 'mms',
            'deposit' => 30,
            'facebook' => 'https://facebook.com',
            'instagram' => 'https://instagram.com',
            'twitter' => 'https://twitter.com',
            'show_banner' => 1,
            'banner_message' => 'hey'
        ]);

    }
}
