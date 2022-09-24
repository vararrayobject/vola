<?php

namespace Database\Seeders;
use File;
use App\Models\User;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get(base_path('database/User.json'));
        $users = json_decode($json);
        
        foreach ($users as $key => $value) {
            User::create([
                "id" => $value->id,
                "isActive" => $value->isActive,
            ]);
        }
    }
}
