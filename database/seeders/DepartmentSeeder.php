<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //create department seeder

        \App\Models\Department::create([
            'company_id' => 1,
            'created_by' => 1,
            'name' => 'IT',
            'description' => 'IT Department',
        ]);

        \App\Models\Department::create([
            'company_id' => 1,
            'created_by' => 1,
            'name' => 'HR',
            'description' => 'HR Department',
        ]);
    }
}
