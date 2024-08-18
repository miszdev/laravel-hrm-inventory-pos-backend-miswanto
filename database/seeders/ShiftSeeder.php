<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //create shifts
        \App\Models\Shift::create([
            'company_id' => 1,
            'name' => 'Day Shift',
            'clock_in_time' => '08:00:00',
            'clock_out_time' => '17:00:00',
        ]);

        \App\Models\Shift::create([
            'company_id' => 1,
            'name' => 'Night Shift',
            'clock_in_time' => '16:00:00',
            'clock_out_time' => '23:00:00',
        ]);
    }
}
