<?php

namespace Database\Seeders;

use App\Models\About;
use App\Models\AdminProfile;
use App\Models\HomePage;
use App\Models\PartitionRule;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use App\Models\Shipping;
use App\Models\SiteConfiguration;
use App\Models\UnitStyle;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        $user = User::create([
//            'first_name' => 'Colin',
//            'last_name'  => 'Barstow',
//            'email'      => 'colinbarstow@gmail.com',
//            'password'   => Hash::make('password'),
//            'email_verified_at' => now()
//        ]);
//
//        AdminProfile::create([
//            'user_id' => $user->id
//        ]);
//
//        About::factory(1)->create();
//
//        ProductCategory::factory(6)->create();
//
//        Shipping::factory(4)->create();
//
//        SiteConfiguration::create([
//            'logo' => 'test',
//            'favicon' => 'test',
//            'website_name' => 'test',
//            'contact_email' => 'test',
//            'contact_number' => 'test',
//            'contact_form_email' => 'test',
//            'address' => 'test',
//            'measurement' => 'test',
//            'deposit' => 1,
//            'facebook' => 'test',
//            'instagram' => 'test',
//            'twitter' => 'test',
//            'show_banner' => 0,
//            'banner_message' => 'test',
//        ]);

        $unitStyle = UnitStyle::create([
            'title' => 'wardrobe',
            'image' => '',
            'model' => '',
            'minimum_width' => 1000,
            'maximum_width' => 2000,
            'minimum_height' => 1600,
            'maximum_height' => 1900,
            'minimum_depth' => 600,
            'maximum_depth' => 700,
            'can_have_partitions' => true,
            'minimum_partitions' => 1,
            'maximum_partitions' => 2,
        ]);

        $partition1 = PartitionRule::create([
            'unit_style_id' => $unitStyle->id,
            'position'      => 1,
            'break_point'   => 1100
        ]);

        $partition2 = PartitionRule::create([
            'unit_style_id' => $unitStyle->id,
            'position'      => 2,
            'break_point'   => 1600
        ]);


    }
}
