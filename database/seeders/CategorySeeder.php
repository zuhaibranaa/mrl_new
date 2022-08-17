<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'id' => 1,
            'name' => 'Horror'
        ]);
        Category::create([
            'id' => 2,
            'name' => 'Science Fiction'
        ]);
        Category::create([
            'id' => 3,
            'name' => 'History'
        ]);
        Category::create([
            'id' => 4,
            'name' => 'Fantasy'
        ]);Category::create([
        'id' => 5,
        'name' => 'Other'
    ]);
    }
}
