<?php

namespace Database\Seeders;

use App\Models\About;
use App\Models\HomePage;
use Illuminate\Database\Seeder;

class HomePageSeeder extends Seeder
{
    public function run()
    {

        $home = HomePage::create([
            'page_title' => 'Home Page',
            'show_featured_items' => 1,
            'show_daily_special' => 1,
            'show_subscribe_to_newsletter' => 1,
            'show_best_sellers' => 1,
            'show_blog' => 1,
            'show_instagram' => 1,
            'show_parallax' => 1,
            'show_latest' => 1,
        ]);

        $about = HomePage::create([
            'page_title' => 'About Page',
            'show_featured_items' => 1,
            'show_daily_special' => 1,
            'show_subscribe_to_newsletter' => 1,
            'show_best_sellers' => 1,
            'show_blog' => 1,
            'show_instagram' => 1,
            'show_parallax' => 1,
            'show_latest' => 1,
        ]);

    }
}
