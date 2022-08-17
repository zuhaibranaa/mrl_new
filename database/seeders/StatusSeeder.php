<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create([
            'id' => 1,
            'name' => 'Currently Reading'
        ]);
        Status::create([
            'id' => 2,
            'name' => 'Read'
        ]);
        Status::create([
            'id' => 3,
            'name' => 'Planned To Read'
        ]);
        Status::create([
            'id' => 4,
            'name' => 'Droped'
        ]);
        Status::create([
            'id' => 5,
            'name' => 'Not Interested'
        ]);
    }
}
