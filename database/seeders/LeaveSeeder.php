<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Leave;

class LeaveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Leave::create([
            'user_id'=>1,
            'leave_type_id'=>1,
            'start_date'=>'2024-08-21',
            'end_date'=>'2024-08-22',
            'is_half_day'=>0,
            'total_days'=>1,
            'is_paid'=>1,
            'reason'=>'Going to Mars',
            'status'=>'pending',
            'company_id'=>1,
        ]);
    }
}
