<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        echo "-- User Seeder Starting --";
        echo "\n";

        User::create([
            "name"=> "Admin Testing",
            "email"=> "test@gmail.com",
            "password"=> Hash::make("test")
        ]);

        User::create([
            "name"=> "Admin Testing 2",
            "email"=> "test2@gmail.com",
            "password"=> Hash::make("test2")
        ]);

        echo "-- User Seeder Finish --";
        echo "\n";
    }
}
