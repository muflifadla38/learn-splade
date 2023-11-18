<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(100)->create();

        \App\Models\User::create([
            'name' => 'Test User',
            'email' => 'mufli@gmail.com',
            'gender' => 'male',
            'password' => Hash::make('12345678'),
        ]);
    }
}
