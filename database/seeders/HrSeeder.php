<?php

namespace Database\Seeders;

use App\Models\HR;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HrSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HR::create([

            'uname' => 'Hr@gmail.com',
            'password' => bcrypt('123')

        ]);
    }
}
