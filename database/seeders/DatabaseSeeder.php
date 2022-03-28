<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'name' => 'Pablo',
            'lastname' => 'Delgado',
            'email' => 'poldelgado@gmail.com',
            'phone' => '381-333-3333',
            'enabled' => true,
            'password' => '$2y$10$UcsQvZ32Tjd6GmBYxalkjeMc2rQTQX4VN11ZVQbAIkXbo3Tt7h9Ni',
            'remember_token' => Str::random(10),
        ]);
        \App\Models\User::factory(100)->create();
    }
}
