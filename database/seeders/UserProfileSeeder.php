<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use File;
use App\Models\UserProfile;

class UserProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get(base_path('database/UserProfile.json'));
        $userProfiles = json_decode($json);
        
        foreach ($userProfiles as $key => $value) {
            UserProfile::create([
                "userId" => $value->userId,
                "name" => $value->name,
                "age" => $value->age,
                "city" => $value->city,
            ]);
        }
    }
}
