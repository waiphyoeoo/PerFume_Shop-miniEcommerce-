<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            "name" => "Wai Phyoe Oo",
            "email" => "waiphyoeoo@gmail.com",
            "password" => bcrypt(123456789),
            "is_admin" => true
        ]);
    }
}
