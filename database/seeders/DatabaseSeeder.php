<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'gender' => 'Male',
            'image' => 'pp.jpg',
            'DOB' => now(),
            'is_admin' => true,
            'password' => Hash::make('admin')
        ]);
        $this->call(\Database\Seeders\StatusSeeder::class);
        $this->call(\Database\Seeders\CategorySeeder::class);
    }
}
