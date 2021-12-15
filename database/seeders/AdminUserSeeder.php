<?php

namespace Database\Seeders;

use App\Models\About;
use App\Models\AdminProfile;
use App\Models\HomePage;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {

//        $user = User::create([
//            'first_name' => 'Colin',
//            'last_name' => 'Barstow',
//            'email' => 'colinbarstow@gmail.com',
//            'password' => Hash::make('Lily0103')
//        ]);

        $profile = AdminProfile::create([
            'user_id' => 1,
            'job_title' => 'Web Developer',
            'image' => '1',
            'telephone_number' => '07456327765',
            'username' => 'colinbarstow',
            'location' => 'London',
            'email' => 1,
            'sms' => 1,
        ]);

    }
}
